<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:250',
            'description'=>'max:1500',
            'img'=>'max:1500|image',
			'file'=>'required|mimes:jpg,jpeg,png,pdf,doc,docx,pptx',
        ];
    }
}