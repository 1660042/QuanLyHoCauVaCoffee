<?php

namespace App\Http\Requests\SanPham;

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
        return [
            'name' => 'required|max:100|unique:products',
            // 'cost_price' => 'required|max:50000000|numeric',
            // 'price' => 'required|max:50000000|numeric',
            'type_product_fk' => 'required',
            'unit_fk' => 'required',
        ];
    }

    public function withValidator($validator) {

        $validator->sometimes(['cost_price', 'price'], 'required|max:50000000|numeric', function($input) {
            return $input->type > 0;
        });

        $validator->sometimes(['type'], 'required|numeric', function($input) {
            return ($input->type == 1 || $input->type == 0);
        });
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
}
