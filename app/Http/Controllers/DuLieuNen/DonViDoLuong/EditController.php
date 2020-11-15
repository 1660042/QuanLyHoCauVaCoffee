<?php

namespace App\Http\Controllers\DuLieuNen\DonViDoLuong;

use App\Repositories\DonVi\DonViRepositoryInterface;
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

	public function __construct(DonViRepositoryInterface $donVi) {

        $this->donVi = $donVi;
    }

    public function __invoke(Request $request, $id)
    {
        $donVi = $this->donVi->find($id);
        $data = compact('donVi');
        return view($this->getView(), $data);
    }

    private function getView() {
        return 'donvi.edit';
    }

}
