<?php

namespace App\Http\Controllers\DuLieuNen\SanPham;

use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;
use App\Repositories\DonVi\DonViRepositoryInterface;
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

	public function __construct(SanPhamRepositoryInterface $sanPham, LoaiSanPhamRepositoryInterface $loaiSanPham, 
    DonViRepositoryInterface $donVi) {
        $this->sanPham = $sanPham;
        $this->loaiSanPham = $loaiSanPham;
        $this->donVi = $donVi;
    }

    public function __invoke(Request $request, $id, $type)
    {
        $sanPham = $this->sanPham->findWithParam($id, 'type', $type);
        $loaiSanPham = $this->loaiSanPham->getListLoaiSanPhamActive('type', $type);
        $donVi = $this->donVi->getListDonViActive();
        $data = compact('sanPham', 'type', 'loaiSanPham', 'donVi');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'sanpham.edit';
    }

}
