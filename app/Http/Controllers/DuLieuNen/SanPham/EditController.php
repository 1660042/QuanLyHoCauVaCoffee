<?php

namespace App\Http\Controllers\DuLieuNen\SanPham;

use App\Repositories\SanPham\SanPhamRepositoryInterface;
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

	public function __construct(SanPhamRepositoryInterface $sanPham) {

        $this->sanPham = $sanPham;


    }

    public function __invoke(Request $request, $id, $type)
    {
        $sanPham = $this->sanPham->findWithParam($id, 'type', $type);
        $data = compact('sanPham', 'type');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'sanpham.edit';
    }

}
