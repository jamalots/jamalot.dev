<?php

class PagesController extends \BaseController {

	public function home() 
	{

		return View::make('pages.home');

	}

	public function getTest() 
	{

		return View::make('pages.testlogin');

	}

	public function about()
	{

		return View::make('pages.about');

	}

}
