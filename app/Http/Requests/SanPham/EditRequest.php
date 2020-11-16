<?php

namespace App\Http\Requests\SanPham;

use Session;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => 'required|max:100|unique:products,name,' . $this->id,
            'cost_price' => 'required|max:50000000|numeric',
            'price' => 'required|max:50000000|numeric',
            'type_product_fk' => 'required',
            'unit_fk' => 'required',
        ];
    }

    public function attributes() {
        return [
            'name' => 'Tên sản phẩm',
            'cost_price' => 'Giá nhập',
            'price' => 'Giá bán',
            'type_product_fk' => 'Loại sản phẩm',
            'unit_fk' => 'Đơn vị'
        ];
    }

    public function messages() {
        return [
            'numeric' => ':attribute phải là số',
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
