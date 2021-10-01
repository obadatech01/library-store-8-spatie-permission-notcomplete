<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowingRequest extends FormRequest
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
            'book_id' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'date_start' => 'required',
            'borrowing_period' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المستعير مطلوب',
            'book_id.required' => 'اسم الكتاب مطلوب',
            'address.required' => 'العنوان مطلوب',
            'mobile.required' => 'رقم الجوال مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'date_start.required' => 'تاريخ بدء الاستعارة مطلوب',
            'borrowing_period.required' => 'مدة الاستعارة مطلوب',
        ];
    }
}
