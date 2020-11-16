<?php

namespace App\Http\Controllers\BanHangPages\Order;

use App\Repositories\DonHang\DonHangRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct(DonHangRepositoryInterface $donHang) {
        $this->donHang = $donHang;
    }
    public function __invoke(Request $request)
    {
        return view($this->getView());
    }

    private function getView() {
        return 'donhang.create';
    }

}
