<?php

namespace App\Http\Controllers\DuLieuNen\SanPham;

use App\SanPham;
use Carbon\Carbon;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPham\CreateRequest;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(SanPhamRepositoryInterface $sanPham) {

        $this->sanPham = $sanPham;
        //$this->modeDebug = config('app.debug');
        $this->message = "";
        $this->result = false;


    }

    public function __invoke(CreateRequest $request)
    {
        
        //dd(strlen($this->message));
        $sanPhamFillable = $this->getFillable('SanPham');
        if(!$request->has('status')) {
            $this->mergeRequest($request, 'status', '0');
        }
        $this->mergeRequest($request, 'created_at', Carbon::now());

        $sanPhamData = $this->getFilterData($request, $sanPhamFillable);
        //dd($SanPhamData);
        $this->result = $this->sanPham->create($sanPhamData);


        if($this->result) {
            $this->result = $this->create_quydoi_donvi($request);
        }

        $this->message = $this->getMessage($this->result);
        

        return redirect()->route($this->getRoute($this->result), $request->type)->with($this->message);

    }

	private function getRoute($result) {
        if(!$result) {
            return 'dln.SanPham.create';
        }
		return 'dln.SanPham.index';
	}

    private function getFillable($name) {
        return config('fillable.' . $name);
    }

    private function getFilterData($request, $fillable) {
        // return array_filter($request->only($fillable), 'strlen');
        return array_filter($request->only($fillable));
    }

    //Thêm 1 field vào request
    private function mergeRequest($request, $nameRequest, $value) {
        return $request->merge([$nameRequest => $value]);
    }

    private function getMessage($result) {
        if($result) {
            $message = [
                'message' => __('Thêm thành công!'), 
                'type' => 'success'
            ];
        } else {
            $message = [
                'message' => __('Lỗi khi tạo sản phẩm, vui lòng kiểm tra lại!'), 
                'type' => 'danger'
            ];
        }
        return $message;
    }

    private function check_valid_unit($request) {
        return $validatedData = $request->validate([
            'unit2_fk' => 'required|different:unit_fk',
        ]);
    }

    private function create_quydoi_donvi($request) {
        if($request->has('qty2')) {
            if($this->check_valid_unit($request)) {
                return $this->sanPham->create_quydoi_donvi($this->sanPham, $this->unit_fk, '1', $request->unit2_fk, $request->qty2);
            }
        }
        
        
    }

}
