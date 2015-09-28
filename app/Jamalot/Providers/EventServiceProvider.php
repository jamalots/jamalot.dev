<?php

namespace Jamalot\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	public function register() 
	{

		$this->app['events']->listen('Jamalot.*','Jamalot\Handlers\EmailNotifier');


	}

}