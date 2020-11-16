<?php
namespace App\Repositories\DonHang;

use DB;
use App\Repositories\EloquentRepository;
use App\Repositories\DonHang\DonHangRepositoryInterface;

class DonHangEloquentRepository extends EloquentRepository implements DonHangRepositoryInterface {
    
    public function getModel() {
        return \App\DonHang::class;
    }

}