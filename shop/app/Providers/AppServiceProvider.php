<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Helper\Cart;
use View;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		view()->composer('*', function($view) {
			$view->with([
				'cats' => Category::where('status',1)->get(),
				'copyright' => 'Techy',
				'cart' => new Cart
			]);
		});
	}
}
