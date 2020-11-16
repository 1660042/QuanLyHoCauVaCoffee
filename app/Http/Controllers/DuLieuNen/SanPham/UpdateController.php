<?php

namespace App\Http\Controllers\DuLieuNen\SanPham;

use App\SanPham;
use Carbon\Carbon;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPham\EditRequest;

class UpdateController extends Controller
{

    public function __construct(SanPhamRepositoryInterface $sanPham) {
        $this->sanPham = $sanPham;
        $this->message = "";
        $this->result = false;
    }
    
    public function __invoke(EditRequest $request, $id)
    {

        $sanPhamFillable = $this->getFillable('sanpham');
        if(!$request->has('status')) {
            $this->mergeRequest($request, 'status', '0');
        }
        $this->mergeRequest($request, 'updated_at', Carbon::now());

        $sanPhamData = $this->getFilterData($request, $sanPhamFillable);
       //dd($loaiSanPhamData);
        $this->result = $this->sanPham->update($id, $sanPhamData);

        $this->message = $this->getMessage($this->result);
        

        return redirect()->route($this->getRoute($this->result), $request->type)->with($this->message);

    }

	private function getRoute($result) {
        if(!$result) {
            return 'dln.sanpham.edit';
        }
		return 'dln.sanpham.index';
	}

    private function getFillable($name) {
        return config('fillable.' . $name);
    }

    private function getFilterData($request, $fillable) {
        return array_filter($request->only($fillable), 'strlen');
        //return array_filter($request->only($fillable));
    }

    //Thêm 1 field vào request
    private function mergeRequest($request, $nameRequest, $value) {
        return $request->merge([$nameRequest => $value]);
    }

    private function getMessage($result) {
        if($result) {
            $message = [
                'message' => __('Sửa thành công!'), 
                'type' => 'success'
            ];
        } else {
            $message = [
                'message' => __('Lỗi khi sửa, vui lòng kiểm tra lại!'), 
                'type' => 'danger'
            ];
        }
        return $message;
    }
}