<?php

namespace App\Http\Controllers;

use App\Note;
use App\Card;

use Illuminate\Http\Request;
use App\Http\Requests;

class NotesController extends Controller
{
    //Laravel uses route binding, so because we had passed in the card in our routes, we can add "Card $card" to our parameters and it will pass in the card we are at
    public function store(Request $request, Card $card) {

    	$this->validate($request, [
    		'body' => 'required|min:10'
    	]);
    	
    	/* Method 1:
    	 * $note = new Note;	//create a new Note
    	 * $note->body = $request->body;	//set the body equal to the user's input
    	 * $card->notes()->save($note);	//save the note in the current card
    	 */

    	/* Method 2:
    	 * $note = new Note(['body'=>$request->body]);	//this works if you set the  * field as 'fillable' in the Model
    	 * $card->notes()->save($note);	
    	 */

    	/* Method 3:
    	 * $card->notes()->save(
    	 * 	new Note(['body'=>$request->body])
    	 * );	
    	 */

    	/* Method 4:
    	 * $card->notes()->create(
    	 * 	['body'=>$request->body]
    	 * );
    	 */

    	/* Method 5:
    	 * $card->notes()->create($request->all()); //the all() method will return an array of all the information
    	*/

    	//Method 6:
    	$note = new Note($request->all());
    	//we are coding it here because we don't have a sign in implemeted yet that would allow us to get the current user's id
    	$card->addNote($note, 1);

    	return back();	//redirect back

    }

    public function edit(Note $note) {
    	return view('notes.edit', compact('note'));
    }


    public function update(Request $request, Note $note) {
    	$note->update($request->all());
    	return back();
    }
}
