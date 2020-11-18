<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'type_product_fk',
        'type',
        'cost_price',
        'unit_fk',
        'price',
        'status',
        'is_time',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public function getDonVi() {
        return $this->belongsTo('App\DonVi', 'unit_fk');
    }

    // public function getPivots($idQuyen, $idLoaiSanPham) {
    //     return $this->belongsToMany('App\Quyen', 'quyen_LoaiSanPham', 'quyen_fk', 'LoaiSanPham_fk');
    //     //->wherePivot('quyen_fk', '=',$idQuyen)
    //     //->withPivot('hien_thi', 'tao_moi', 'cap_nhat', 'xoa', 'xem_chi_tiet', 'duyet', 'bo_duyet', 'xuat_excel')
        
    //     //->wherePivot('LoaiSanPham_fk',$idLoaiSanPham)
    //     //->get();
        
    // }

    

    

}
