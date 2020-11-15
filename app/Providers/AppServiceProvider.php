<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(

        //     \App\Repositories\Quyen\QuyenRepositoryInterface::class,
        //     \App\Repositories\Quyen\QuyenEloquentRepository::class
        // );

        $this->app->singleton(
            \App\Repositories\Menu\MenuRepositoryInterface::class,
            \App\Repositories\Menu\MenuEloquentRepository::class
         );

        $this->app->singleton(
            \App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface::class,
            \App\Repositories\LoaiSanPham\LoaiSanPhamEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\SanPham\SanPhamRepositoryInterface::class,
            \App\Repositories\SanPham\SanPhamEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\DonVi\DonViRepositoryInterface::class,
            \App\Repositories\DonVi\DonViEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
