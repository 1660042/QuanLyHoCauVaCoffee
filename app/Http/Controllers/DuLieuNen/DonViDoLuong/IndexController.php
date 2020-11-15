<?php

namespace App\Http\Controllers\DuLieuNen\DonViDoLuong;

use App\Repositories\DonVi\DonViRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(DonViRepositoryInterface $donVi) {
        $this->donVi = $donVi;
    }
    public function __invoke(Request $request)
    {   
        $donVi = $this->donVi->getAll();
        $data = compact('donVi');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'donvi.index';
    }
}
