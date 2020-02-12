<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
          'title'=>'required|string|min:5|max:10',
          'body'=>'required|string|min:5|max:10',
        ];
    }
    public function messages()
    {
        return [
          'title.required'=>'فیلد عنوان اجباری است.',
          'title.min'=>'حداقل 5 کاراکتر',
          'body.min'=>'حداقل 5 کاراکتر',
          'body.required'=>'فیلد متن اجباری است.',
        ];
    }
}
