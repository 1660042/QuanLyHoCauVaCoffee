<?php
namespace App\Repositories\SanPham;

use DB;
use App\Repositories\EloquentRepository;
use App\Repositories\SanPham\SanPhamRepositoryInterface;

class SanPhamEloquentRepository extends EloquentRepository implements SanPhamRepositoryInterface {
    
    public function getModel() {
        return \App\SanPham::class;
    }

    public function create_quydoi_donvi($product_fk, $unit1_fk, $qty1, $unit2_fk, $qty2) {
        return $this->_model->insert([
            [
                'product_fk' => $product_fk,
                'unit1_fk' => $unit1_fk,
                'qty1' => '1',
                'unit2_fk' => $unit2_fk,
                'qty2' => $qty2
            ]
        ]);
    }
}