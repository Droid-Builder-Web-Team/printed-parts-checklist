<?php

namespace App\Http\Requests;

use App\Models\BillOfMaterial;
use App\Models\Droid;
use App\Models\DroidFaq;
use App\Models\DroidGallery;
use App\Models\Instruction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUpdateDroidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            // Droid Details
            'droid_name' => 'trim|escape|uppercase',
            'droid_version' => 'trim|escape|capitalize',
            'build_level' => 'required|string|trim|escape',
            'droid_description' => 'required|string|trim|escape',
            'droid_tags' => 'nullable|trim|escape',
            'droid_avatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif,webp|max:2048',

            // Instructions
            'instructions_title' => 'required|escape|capitalize',
            'instructions_file' => 'required|mimes:pdf|max:2048',

            // Bill Of Materials
            'bill_of_materials_title' => 'required|escape|capitalize',
            'bill_of_materials_file' => 'required|mimes:pdf|max:2048',

            // Droid Gallery
            'gallery_images[]' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif,webp|max:2048',

            // Faqs
            'faq_title' => 'required|escape|capitalize',
            'faq_title' => 'required|escape|trim',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // Droid Details
            'droid_name' => 'required|string',
            'droid_version' => 'required|string',
            'build_level' => 'required|string',
            'droid_description' => 'required|string',
            'droid_tags' => 'nullable',
            'droid_avatar' => 'required',

            // Instructions
            'instructions_title' => 'required|string',
            'instructions_file' => 'required',

            // Bill Of Materials
            'bill_of_materials_title' => 'required',
            'bill_of_materials_file' => 'required',

            //Gallery
            'gallery_images[]' => 'nullable',

            // FAQs
            'faq_title' => 'required|string',
            'faq_content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'version' => 'version',
            'build_level' => 'type',
            'description' => 'description',
            'droid_tags' => 'tags',
            'droid_avatar' => 'droid avatar',

            // Instructions
            'instructions_title' => 'instructions title',
            'instructions_file' => 'instructions file',

            // Bill Of Materials
            'bill_of_materials_title' => 'bill of materials title',
            'bill_of_materials_file' => 'bill of materials file',

            //Gallery
            'gallery_images' => 'gallery images',

            // FAQs
            'faq_title' => 'faq title',
            'faq_content' => 'faq content',
        ];
    }

    /**
     * @param Droid|null $droid
     * @param Instruction|null $instruction
     * @param BillOfMaterial|null $bom
     * @param DroidGallery|null $gallery
     * @param DroidFaq|null $faq
     * @return void
     */
    public function store(
        Droid          $droid = null,
        Instruction    $instruction = null,
        BillOfMaterial $bom = null,
        DroidGallery   $gallery = null,
        DroidFaq       $faq = null
    )
    {
        $action = ' updated.';

        if (is_null($droid)) {
            $droid = new Droid;
            $action = ' created.';
        }

        // Droid
        $droid->name = strtoupper($this->input('droid_name'));
        $droid->version = $this->input('droid_version');
        $droid->description = $this->input('droid_description');
        $droid->tags = json_encode(explode(',', $this->input('droid_tags')));
        $droid->droid_gallery_id = null; // Hardcoded for testing
        $droid->type_id = $this->input('build_level');

        $droid->save();
        dd($droid);

        if ($this->hasFile('droid_avatar')) {
            $file = $this->file('droid_avatar');
            $fileName = $file->getClientOriginalName();
            $path = $file->store("public/droids/" . $droid->id . "/droid-mainframe-images");
            $droid->image = $path;
            $droid->save();
        }

        // Instructions
        if (is_null($instruction)) {
            $instruction = new Instruction;
        }
        // Check the file, get the name and store
        if ($this->hasFile('instructions_file')) {
            $file = $this->file('instructions_file');
            $fileName = $file->getClientOriginalName();
            $path = $file->store('public/droids/' . $droid->id . '/instructions');
        }

        $instruction->droids_id = $droid->id;
        $instruction->title = $this->input('instructions_title');
        $instruction->url = $path;
        $instruction->save();

        // Bill Of Materials
        if (is_null($bom)) {
            $bom = new BillOfMaterial;
        }

        // Check the file, get the name and store
        if ($this->hasFile('bill_of_materials_file')) {
            $file = $this->file('bill_of_materials_file');
            $fileName = $file->getClientOriginalName();
            $path = $file->store('public/droids/' . $droid->id . '/bill_of_materials');
        }

        $bom->droids_id = $droid->id;
        $bom->title = $this->input('bill_of_materials_title');
        $bom->url = $path;
        $bom->save();

        // Gallery
        if (is_null($gallery)) {
            $gallery = new DroidGallery;
        }

        // Check the file, get the name and store
        if ($this->hasFile('gallery_images')) {
            foreach ($this->file('gallery_images') as $galleryImage) {
                $gallery->droids_id = $droid->id;
                $file = $galleryImage->file('gallery_images');
                $fileName = $file->getClientOriginalName();
                $path = $file->store('public/droids/' . $droid->id . '/gallery');
                $gallery->url = $path;
                $gallery->save();
            }
        }

        // FAQs
        if (is_null($faq)) {
            $faq = new DroidFaq;
        }

        $faq->droids_id = $droid->id;
        $faq->title = $this->input('faq_title');
        $faq->content = $this->input('faq_content');
        $faq->save();

        return redirect('/droids/' . $droid->id);

        if (!$errors) {
            notify()->success($droid->name . $action);
        }
    }
}
