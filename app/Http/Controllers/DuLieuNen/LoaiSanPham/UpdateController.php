<?php

namespace App\Http\Controllers\DuLieuNen\LoaiSanPham;

use App\LoaiSanPham;
use Carbon\Carbon;
use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoaiSanPham\EditRequest;

class UpdateController extends Controller
{

    public function __construct(LoaiSanPhamRepositoryInterface $loaiSanPham) {
        $this->loaiSanPham = $loaiSanPham;
        $this->message = "";
        $this->result = false;
    }
    
    public function __invoke(EditRequest $request, $id)
    {

        $loaiSanPhamFillable = $this->getFillable('loaisanpham');
        if(!$request->has('status')) {
            $this->mergeRequest($request, 'status', '0');
        }
        $this->mergeRequest($request, 'updated_at', Carbon::now());

        $loaiSanPhamData = $this->getFilterData($request, $loaiSanPhamFillable);
       //dd($loaiSanPhamData);
        $this->result = $this->loaiSanPham->update($id, $loaiSanPhamData);

        $this->message = $this->getMessage($this->result);
        

        return redirect()->route($this->getRoute($this->result), $request->type)->with($this->message);

    }

	private function getRoute($result) {
        if(!$result) {
            return 'dln.loaisanpham.edit';
        }
		return 'dln.loaisanpham.index';
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