<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected static $repositories = [
        'menu' => [
            \App\Repositories\Menu\MenuRepositoryInterface::class,
            \App\Repositories\Menu\MenuEloquentRepository::class
        ],
        'loaiSanPham' => [
            \App\Repositories\LoaiSanPham\LoaiSanPhamRepositoryInterface::class,
            \App\Repositories\LoaiSanPham\LoaiSanPhamEloquentRepository::class
        ],
        'sanPham' => [
            \App\Repositories\SanPham\SanPhamRepositoryInterface::class,
            \App\Repositories\SanPham\SanPhamEloquentRepository::class
        ],
        'donVi' => [
            \App\Repositories\DonVi\DonViRepositoryInterface::class,
            \App\Repositories\DonVi\DonViEloquentRepository::class
        ],
        'donHang' => [
            \App\Repositories\DonHang\DonHangRepositoryInterface::class,
            \App\Repositories\DonHang\DonHangEloquentRepository::class
        ]
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
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
