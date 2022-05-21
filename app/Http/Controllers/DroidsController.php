<?php

namespace App\Http\Controllers;

use App\Models\Droid;
use App\Models\DroidFaq;
use App\Models\Instruction;
use App\Models\DroidGallery;
use Illuminate\Http\Request;
use App\Models\BillOfMaterial;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateDroidRequest;

class DroidsController extends Controller
{
    public function __invoke()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.droids.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateDroidRequest $request)
    {
        $validated = $request->validated();

        // Creating Droid
        $droid = new Droid();
        $droid->name = $validated->name;
        $droid->version = $validated->version;
        $droid->description = $validated->description;
        $droid->type = $validated->type;
        $droid->image = $validated->droid_avatar;
        $droid->save();

        // Creating Instructions
        $instructions = new Instruction();
        $instructions->droids_id = $droid->id;
        $instructions->title = $validated->instructions_title;
        $instructions->title = $validated->instruction_file;
        $instructions->save();

        // Creating Bill Of Materials
        $bom = new BillOfMaterial();
        $bom->droids_id = $droid->id;
        $bom->title = $validated->bill_of_materials_title;
        $bom->url = $validated->bill_of_materials_file;
        $bom->save();

        // Create Gallery
        $gallery = new DroidGallery();
        $gallery->droids_id = $droid->id;
        // $gallery->url = $validated->
        $gallery->save();

        $faqs = new DroidFaq();
        $faqs->droids_id = $droid->id;
        $faqs->title = $validated->title;
        $faqs->content = $validated->content;
        $faqs->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Droid $droid)
    {
        $singleDroid = Droid::where('id', $droid->id)->first();
        $droidFaqs = DroidFaq::where('droid_id', $droid->id)->get();

        return view('droids.show', [
            'singleDroid' => $singleDroid,
            'droidFaqs' => $droidFaqs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
