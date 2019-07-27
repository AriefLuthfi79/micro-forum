<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'category_id' => 'required|numeric',
            'description' => 'required|max:255',
        ];
    }

    /**
    * Return flash messages if not validate
    *
    * @return array
    */
    public function messages(): array
    {
        return [
            'title.required' => 'Title must required',
            'category_id.required' => 'Category must required',
            'description.required' => 'Description must required',
        ];
    }
}
