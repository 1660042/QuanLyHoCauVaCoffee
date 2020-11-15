<?php

namespace App\Http\Controllers\DuLieuNen\LoaiSanPham;

use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(LoaiSanPhamRepositoryInterface $loaiSanPham) {
        $this->loaiSanPham = $loaiSanPham;
    }
    public function __invoke(Request $request, $type)
    {
        $listLoaiSP = $this->loaiSanPham->getAllWithParam('type', $type);
        $data = compact('listLoaiSP', 'type');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'loaisanpham.index';
    }
}
