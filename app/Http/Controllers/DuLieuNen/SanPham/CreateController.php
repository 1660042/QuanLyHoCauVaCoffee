<?php

namespace App\Http\Controllers\DuLieuNen\SanPham;

use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;
use App\Repositories\DonVi\DonViRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct(SanPhamRepositoryInterface $sanPham, LoaiSanPhamRepositoryInterface $loaiSanPham, 
        DonViRepositoryInterface $donVi) {
        $this->sanPham = $sanPham;
        $this->loaiSanPham = $loaiSanPham;
        $this->donVi = $donVi;
    }
    public function __invoke(Request $request, $type)
    {
        $loaiSanPham = $this->loaiSanPham->getListLoaiSanPhamActive('type', $type);
        $donVi = $this->donVi->getListDonViActive();
        $data = compact('type', 'loaiSanPham', 'donVi');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'sanpham.create';
    }

}
