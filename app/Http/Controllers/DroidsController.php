<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateDroidRequest;
use App\Models\BillOfMaterial;
use App\Models\Droid;
use App\Models\DroidFaq;
use App\Models\DroidGallery;
use App\Models\DroidType;
use App\Models\Instruction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class DroidsController extends Controller
{
    public function __invoke()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $droidsList = Droid::paginate(9);

        return view('mainframe', [
            'droidsList' => $droidsList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateDroidRequest $request
     * @param Droid|null $droid
     * @return Response|null
     */
    public function createUpdateNewDroid(CreateUpdateDroidRequest $request, Droid $droid = null)
    {
        return $request->store($droid);
    }

    /**
     * Display the specified resource.
     *
     * @param Droid $droid
     * @return Application|Factory|View
     */
    public function show(Droid $droid)
    {
        $singleDroid = Droid::where('id', $droid->id)->first();
        $instructions = Instruction::where('droids_id', $singleDroid->id)->first();
        $bom = BillOfMaterial::where('droids_id', $singleDroid->id)->first();
        $droidGallery = DroidGallery::where('droids_id', $singleDroid->id)->get();
        $droidFaqs = DroidFaq::where('droids_id', $droid->id)->get();

        return view('droids.show', [
            'singleDroid' => $singleDroid,
            'instructions' => $instructions,
            'bom' => $bom,
            'droidGallery' => $droidGallery,
            'droidFaqs' => $droidFaqs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Droid|null $droid
     * @return Application|Factory|View
     */
    public function update(Droid $droid = null)
    {
        $droid = Droid::find($droid->id)->with('types')->first();
        $types = DroidType::all();
        $instructions = Instruction::where('droid_id', $droid->id)->first();
        $bom = BillOfMaterial::where('droid_id', $droid->id)->first();
        $gallery = DroidGallery::where('droid_id', $droid->id)->get();
        $faq = DroidFaq::where('droid_id', $droid->id)->get();

        return view('admin.droids.update', [
            'droid' => $droid,
            'types' => $types,
            'instructions' => $instructions,
            'bom' => $bom,
            'gallery' => $gallery,
            'faq' => $faq
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
