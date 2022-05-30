<?php

namespace App\Http\Controllers;

use App\Models\Droid;
use App\Models\DroidFaq;
use App\Models\Instruction;
use App\Models\DroidGallery;
use Illuminate\Http\Request;
use App\Models\BillOfMaterial;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
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
        $droid->name = $validated['name'];
        $droid->version = $validated['version'];
        $droid->description = $validated['description'];
        $droid->type = $validated['type'];

        Storage::makeDirectory('public/droid-mainframe-images');

        $image = $request->file('droid_avatar');

        $fileName = uniqid();
        $filePathTiny = "droid-mainframe-images/$fileName" . "_x376.webp";
        $storagePathTiny = storage_path("app/public/$filePathTiny");

        Image::make($image->getRealPath())
            ->encode('webp', 40)
            ->fit(376, 376)
            ->save($storagePathTiny);

        $droid->image = "storage/$filePathTiny";
        $droid->save();

        // Creating Instructions
        $instructions = new Instruction();
        $instructions->droids_id = $droid->id;
        $instructions->title = $validated['instructions_title'];

        Storage::makeDirectory('public/droid-instructions');

        $fileName = time() . '_' . $request->file('instructions_file')->getClientOriginalName();
        $filePath = $request->file('instructions_file')->storeAs('droid-instructions', $fileName, 'public');
        $instructions->url = 'storage/' . $filePath;

        $instructions->save();

        // Creating Bill Of Materials
        $bom = new BillOfMaterial();
        $bom->droids_id = $droid->id;
        $bom->title = $validated['bill_of_materials_title'];

        Storage::makeDirectory('public/droid-bill-of-materials');

        $fileName = time() . '_' . $request->file('bill_of_materials_file')->getClientOriginalName();
        $filePath = $request->file('bill_of_materials_file')->storeAs('droid-bill-of-materials', $fileName, 'public');
        $bom->url = 'storage/' . $filePath;

        $bom->save();

        // Create Gallery
        if ($request->has('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $gallery = new DroidGallery();
                $gallery->droids_id = $droid->id;

                $imageName = $galleryImage->getClientOriginalName();
                $filePath = $galleryImage->storeAs("droid-gallery/$droid->id", $imageName, 'public');
                $gallery->url = 'storage/' . $filePath;
                $gallery->save();
            }
        }

        $faqs = new DroidFaq();
        $faqs->droids_id = $droid->id;
        $faqs->title = $validated['title'];
        $faqs->content = $validated['content'];
        $faqs->save();

        return view('admin.droids.create');
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
        $instructions = Instruction::where('droids_id', $singleDroid->id)->first();
        $bom = BillOfMaterial::where('droids_id', $singleDroid->id)->first();
        $droidGallery = DroidGallery::where('droids_id', $singleDroid->id)->get();
        $droidFaqs = DroidFaq::where('droids_id', $droid->id)->get();

        notify()->success($singleDroid->name . ' Successfully Created');

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
