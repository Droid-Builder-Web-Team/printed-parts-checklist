<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'trim|escape|capitalize',
            'version' => 'trim|escape|capitalize',
            'type' => 'required|string|trim|escape',
            'description' => 'required|string|trim|escape',
            'tags' => 'nullable|array|trim|escape',
            'droid_avatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif,webp|max:2048',
            'instructions_file' => 'required|mimes:pdf|max:2048',
            'gallery_images[]' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif,webp|max:2048',
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
            'name' => 'required|string',
            'version' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'tags' => 'nullable|array',
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
            'title' => 'required|string',
            'content' => 'required',
        ];
    }
}
