<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    //
	public function home() {
		$people = ['Dave', 'Ashley', 'Luis', 'Josh', 'Abe'];
    	return view('welcome', compact('people'));
	}

	public function about() {
		return view('about');
	}
}
