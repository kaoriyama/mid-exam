<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'lastname' => ['required'],
            'firstname' => ['required'],
            'email' => ['required'],
            'tel1' => ['required', 'numeric'],
            'tel2' => ['required', 'numeric'],
            'tel3' => ['required', 'numeric'],
            'content' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => '名前を入力してください',
            'lastname.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel1.tel2.tel3.numeric' => '電話番号を数値で入力してください',
        ];
    }
}
