<?php

namespace App\Http\Controllers\BanHangPages\Order;

use App\Repositories\DonHang\DonHangRepositoryInterface;
use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct(DonHangRepositoryInterface $donHang, LoaiSanPhamRepositoryInterface $loaiSanPham, 
    SanPhamRepositoryInterface $sanPham) {
        $this->donHang = $donHang;
        $this->loaiSanPham = $loaiSanPham;
        $this->sanPham = $sanPham;
    }
    public function __invoke(Request $request)
    {
        $loaiSanPham = $this->loaiSanPham->getAllActive();
        $sanPham = $this->sanPham->getAllActive();
        $data = compact('loaiSanPham', 'sanPham');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'donhang.create';
    }

}
