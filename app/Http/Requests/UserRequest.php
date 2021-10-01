<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'roles_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'image' => 'mimes:jpeg,jpg,png,jfif',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب',
            'roles_name.required' => 'الصلاحيات مطلوبة',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'البريد الإلكتروني موجود مسبقًا',
            'password.required' => 'كلمة السر مطلوبة',
            'password.confirmed' => 'أعد كتابة كلمة السر بشكل صحيح',
            'password.min' => 'الحد الأدنى 8 رموز',
            'image.mimes' => 'يجب أن تكون الصورة بأحد الصيغ التالية: jpeg,jpg,png,jfif',
        ];
    }
}
