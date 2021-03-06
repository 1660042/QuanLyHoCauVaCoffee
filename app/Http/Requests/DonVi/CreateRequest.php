<?php

namespace App\Http\Requests\DonVi;

use Session;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:100|unique:units',
        ];
        
        return $rules;

        
    }

    public function attributes() {
        return [
            'name' => 'Tên đơn vị'
        ];
    }

    public function messages() {
        return [

            'required' => ':attribute không được bỏ trống',
            'unique' => ':attribute đã tồn tại trong hệ thống',
        ];
    }

    // public function withValidator($validator)
    // {
    //     if ($validator->fails()) {
    //         Session::flash('message', 'Lỗi khi tạo quyền mới, vui lòng kiểm tra lại!');
    //         Session::flash('type', 'danger');
    //     } else {

    //     }

    // }
}
