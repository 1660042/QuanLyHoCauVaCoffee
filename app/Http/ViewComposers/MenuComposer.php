<?php

namespace App\Http\ViewComposers;

use App\Repositories\Menu\MenuRepositoryInterface;
use App\Repositories\Menu\MenuEloquentRepository;
use Illuminate\View\View;

 class MenuComposer
 {
    public function __construct() {
        $this->ud = new MenuEloquentRepository();
    }
	public function compose(View $view) {
        
        $listMenu = $this->ud->getMenu(0);
		$listMenuCon = $this->ud->getMenuConHD();
		$data = compact('listMenu', 'listMenuCon');
		$view->with($data);
	}
 }
