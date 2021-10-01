<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|unique:books,name',
            'category_id' => 'required',
            'code' => 'required|unique:books,code',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الكتاب مطلوب',
            'name.unique' => 'اسم الكتاب موجود مسبقًا',
            'category_id.required' => 'القسم مطلوب',
            'code.required' => 'كود الكتاب مطلوب',
            'code.unique' => 'هذا الكود مستخدم مسبقًا',
        ];
    }
}
