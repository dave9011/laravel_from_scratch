<?php

namespace App\Http\Controllers;

use DB;  //import statement
use App\Card;
use Illuminate\Http\Request;
use App\Http\Requests;

class CardsController extends Controller
{
    public function index() {

    	//$cards = DB::table('cards')->get();	//read the cards table

    	$cards = Card::all();	//using Eloquent to get the cards

    	//return the cards index view, passing in our database data
    	return view('cards.index', compact('cards'));  

    }

    //Method 1:
    //for fetching the data (this one is more manual)
   	//
    //public function show($id) {
    //	$card = Card::find($id);
    //	return view('cards.show', compact('card'));
    //}

	//Method 2:
	//for fetching the data (this one has Laravel fetch the data in the background)
	//
	//**Important: the parameter name MUST BE THE SAME as the wildcard name in 
	//the route.php get
    public function show(Card $card) {

        //retrieve all our Cards along with their notes and users 
        $card = Card::with('notes.user')->find($card->id); 
    	return view('cards.show', compact('card'));
    }

}
