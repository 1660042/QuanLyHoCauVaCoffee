<?php

namespace App\Http\Controllers\DuLieuNen\LoaiSanPham;

use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	public function __construct(LoaiSanPhamRepositoryInterface $loaiSanPham) {

        $this->loaiSanPham = $loaiSanPham;


    }

    public function __invoke(Request $request, $id, $type)
    {
        $loaiSanPham = $this->loaiSanPham->findWithParam($id, 'type', $type);
        $data = compact('loaiSanPham', 'type');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'loaisanpham.edit';
    }

}
