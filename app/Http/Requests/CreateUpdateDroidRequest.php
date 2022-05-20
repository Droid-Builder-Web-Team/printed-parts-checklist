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
            'image' => 'required',
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
            'title' => 'required|string',
            'version' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'image' => 'required',
        ];
    }
}
