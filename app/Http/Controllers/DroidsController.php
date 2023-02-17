<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateDroidRequest;
use App\Models\BillOfMaterial;
use App\Models\Droid;
use App\Models\DroidFaq;
use App\Models\DroidGallery;
use App\Models\Instruction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.droids.create');
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
