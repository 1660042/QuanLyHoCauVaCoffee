<?php

namespace App\Http\Controllers\DuLieuNen\DonViDoLuong;

use App\Repositories\DonVi\DonViRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct(DonViRepositoryInterface $donVi) {
        $this->donVi = $donVi;
    }
    public function __invoke(Request $request)
    {
        return view($this->getView());
    }

    private function getView() {
        return 'donvi.create';
    }

}
