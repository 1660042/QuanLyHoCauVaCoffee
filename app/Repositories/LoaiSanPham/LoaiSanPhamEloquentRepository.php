<?php
namespace App\Repositories\LoaiSanPham;

use DB;
use App\Repositories\EloquentRepository;
use App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface;

class LoaiSanPhamEloquentRepository extends EloquentRepository implements LoaiSanPhamRepositoryInterface {
    
    public function getModel() {
        return \App\LoaiSanPham::class;
    }

    public function getListLoaiSanPhamActive($key, $value) {
        return $this->_model->where([
            [$key, '=', $value],
            ['status', '=', 1],
            // ['view', '=', 1]
        ])->get();
    }

    public function getAllActive() {
        return $this->_model->where([
            ['status', '=', 1],
            // ['view', '=', 1]
        ])->get();
    }
}