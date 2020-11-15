<?php

namespace App\Http\Controllers\DuLieuNen\DonViDoLuong;

use App\DonVi;
use Carbon\Carbon;
use App\Repositories\DonVi\DonViRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonVi\CreateRequest;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(DonViRepositoryInterface $donVi) {

        $this->donVi = $donVi;
        //$this->modeDebug = config('app.debug');
        $this->message = "";
        $this->result = false;


    }

    public function __invoke(CreateRequest $request)
    {
        
        //dd(strlen($this->message));
        $donViFillable = $this->getFillable('donvi');
        if(!$request->has('status')) {
            $this->mergeRequest($request, 'status', '0');
        }
        $this->mergeRequest($request, 'created_at', Carbon::now());

        $donViData = $this->getFilterData($request, $donViFillable);
        //dd($loaiSanPhamData);
        $this->result = $this->donVi->create($donViData);

        $this->message = $this->getMessage($this->result);
        

        return redirect()->route($this->getRoute($this->result), $request->type)->with($this->message);

    }

	private function getRoute($result) {
        if(!$result) {
            return 'dln.donvi.create';
        }
		return 'dln.donvi.index';
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
                'message' => __('Lỗi khi tạo đơn vị, vui lòng kiểm tra lại!'), 
                'type' => 'danger'
            ];
        }
        return $message;
    }

}
