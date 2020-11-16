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

        // $a = $this->selectTimesOfDay();

        // dd($a);

        $donVi = $this->donVi->getAll();
        $data = compact('donVi');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'donvi.index';
    }

    public function selectTimesOfDay() {
        $open_time = strtotime("17:00");
        $close_time = strtotime("23:59");
        $now = time();
        $output = "";
        
        return (($close_time - $open_time)/60) % 60;
    }
}
