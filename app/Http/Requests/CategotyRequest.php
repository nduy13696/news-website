<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategotyRequest extends FormRequest
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
            'txt_name' => 'required',
            'rd_active' => 'required',
            'txt_position'=>'required',
        ];
    }

    public function messages(){
      return [
        'txt_name.required' => 'Yeu cau nhap danh muc',
        'rd_active.required' => 'yeu cau nhap thao tac',
        'txt_position.required'=> 'Yeu cau nhap vi tri'
      ];
    }
}
