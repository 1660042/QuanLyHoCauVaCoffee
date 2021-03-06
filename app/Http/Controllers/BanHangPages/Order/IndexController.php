<?php

namespace App\Http\Controllers\BanHangPages\Order;

use App\Repositories\DonHang\DonHangRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(DonHangRepositoryInterface $donHang) {
        $this->donHang = $donHang;
    }
    public function __invoke(Request $request)
    {
        $donHang = $this->donHang->getAll();
        $data = compact('donHang');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'donhang.index';
    }
}
