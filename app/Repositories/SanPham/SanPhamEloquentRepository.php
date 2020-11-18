<?php
namespace App\Repositories\SanPham;

use DB;
use App\Repositories\EloquentRepository;
use App\Repositories\SanPham\SanPhamRepositoryInterface;

class SanPhamEloquentRepository extends EloquentRepository implements SanPhamRepositoryInterface {
    
    public function getModel() {
        return \App\SanPham::class;
    }

    public function getAllActive() {
        return $this->_model->where([
            ['status', '=', 1],
            // ['view', '=', 1]
        ])->get();
    }

}