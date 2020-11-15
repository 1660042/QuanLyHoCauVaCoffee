<?php 

namespace App\Repositories\SanPham;

interface SanPhamRepositoryInterface {

    
    public function getModel();

    public function create_quydoi_donvi($product_fk, $unit1_fk, $qty1, $unit2_fk, $qty2);

}