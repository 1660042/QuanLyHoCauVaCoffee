<?php 

namespace App\Repositories\LoaiSanPham;

interface LoaiSanPhamRepositoryInterface {

    
    public function getModel();
    public function getListLoaiSanPhamActive($key, $value);
    public function getAllActive();
}