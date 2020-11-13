<?php

namespace App\Http\Controllers\BanHangPages\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(QuyenRepositoryInterface $quyen) {
        $this->quyen = $quyen;
    }
    public function __invoke(Request $request)
    {
        $dsQuyen = $this->quyen->getAll();
        $data = compact('dsQuyen');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'quyen.index';
    }
}
