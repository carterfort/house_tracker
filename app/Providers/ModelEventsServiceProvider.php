<?php

namespace App\Providers;

use App\Bill;
use Illuminate\Support\ServiceProvider;

class ModelEventsServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
        Bill::created(function ($bill) {
            $bill->apportion();
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		
	}
}