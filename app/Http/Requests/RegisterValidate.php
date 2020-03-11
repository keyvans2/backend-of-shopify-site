<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidate extends FormRequest
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

            'email' => 'required|email|unique:users',
            'name' => 'required|min:4',
            'password' => 'required|min:8',
            'retype_password' => 'required|same:password',
            'username' => 'required|unique:users',
            'phone' => 'required',
            'birthday' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'وارد کردن ایمیل اجباری است',
            'email.email' => 'دستور ایمیل اشتباه است',
            'email.unique' => 'ایمیلی با این مشخصات از قبل موجود است',
            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password.min' => 'حداقل :attribute باید وارد کنید',
            'retype_password.same' => 'رمز های عبور وارد شده باهم مظابقت ندارند',
            'username.required' => 'وارد کردن نام کاربری الزامی است',
            'username.unique' => 'نام کاربری با این مشخصات از قبل موجود است',
            'birthday.required' => 'وارد کردن تاریخ تولد الزامی است',
        ];
    }
}
