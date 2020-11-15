<?php

namespace App\Http\Controllers\DuLieuNen\SanPham;

use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(SanPhamRepositoryInterface $sanPham) {
        $this->sanPham = $sanPham;
    }
    public function __invoke(Request $request, $type)
    {
        $listSanPham = $this->sanPham->getAllWithParam('type', $type);
        $data = compact('listSanPham', 'type');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'sanpham.index';
    }
}
