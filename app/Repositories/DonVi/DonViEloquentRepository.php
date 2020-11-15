<?php
namespace App\Repositories\DonVi;

use DB;
use App\Repositories\EloquentRepository;
use App\Repositories\DonVi\DonViRepositoryInterface;

class DonViEloquentRepository extends EloquentRepository implements DonViRepositoryInterface {
    
    public function getModel() {
        return \App\DonVi::class;
    }

    public function getListDonViActive() {
        return $this->_model->where([
            ['status', '=', 1],
            // ['view', '=', 1]
        ])->get();
    }
}