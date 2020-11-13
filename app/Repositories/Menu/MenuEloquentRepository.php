<?php
namespace App\Repositories\Menu;

use DB;
use App\Repositories\EloquentRepository;
use App\Repositories\Menu\MenuRepositoryInterface;

class MenuEloquentRepository extends EloquentRepository implements MenuRepositoryInterface {
    
    public function getModel() {
        return \App\Menu::class;
    }

    public function getMenu($level) {
        return $this->_model->where([
            ['menu_fk', '=', $level],
            ['status', '=', 1],
            ['view', '=', 1]
        ])->orderByRaw('number')->get();
    }

    public function getMenuConHD() {
        return $this->_model->where([
            ['menu_fk', '!=', 0],
            ['status', '=', 1],
            ['view', '=', 1],
        
        ])->orderBy('menu_fk')->get();
    }

    public function getMenuHD() {
        return $this->_model->where([
            ['status', '=', 1],
            ['view', '=', 1]
        ])->get();
    }

    public function countMenuConHD($id) {
        return $this->_model->where([
            ['status', '=', 1],
            ['view', '=', 1],
            ['menu_fk', '=', $id]
        ])->count();
    }

    public function getMenuChaHD($id) {
        return $this->_model->where([
            ['status', '=', 1],
            ['view', '=', 1],
            ['menu_fk', '=', 0],
            ['id', '=', $id]
        ])->first();
    }

    public function getTablePivot($idQuyen, $idMenu) {
        return DB::table('quyen_Menu')->where([
            ['quyen_fk', $idQuyen],
            ['menu_fk', $idMenu]
        ])->get();
        
    }

    public function getMenuByRouteName($routeName) {
        return $this->_model->where([
            ['cap_do', '=', 2],
            ['status', '=', 1],
            ['view', '=', 1],
            ['route_name', '=', $routeName]
        ])->first();
    }

    
}