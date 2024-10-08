<?php

namespace App\Providers;

use App\Services\ICartDetailService;
use App\Services\ICartService;
use App\Services\ICategoryService;
use App\Services\Impl\CartDetailServiceImpl;
use App\Services\Impl\CartServiceImpl;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\IProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $productService = new ProductServiceImpl();
        $this->app->singleton(IProductService::class, ProductServiceImpl::class);
        $this->app->singleton(ICategoryService::class, CategoryServiceImpl::class);
        $this->app->singleton(ICartService::class, CartServiceImpl::class);
        $this->app->singleton(ICartDetailService::class, CartDetailServiceImpl::class);
    }
}
