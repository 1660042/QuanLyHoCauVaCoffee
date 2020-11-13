<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'name', 'level',
        'route_name', 'menu_fk',
        'status', 'view'
    ];

    // public function getPivots($idQuyen, $idMenu) {
    //     return $this->belongsToMany('App\Quyen', 'quyen_Menu', 'quyen_fk', 'Menu_fk');
    //     //->wherePivot('quyen_fk', '=',$idQuyen)
    //     //->withPivot('hien_thi', 'tao_moi', 'cap_nhat', 'xoa', 'xem_chi_tiet', 'duyet', 'bo_duyet', 'xuat_excel')
        
    //     //->wherePivot('Menu_fk',$idMenu)
    //     //->get();
        
    // }

    

    

}
