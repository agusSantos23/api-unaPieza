<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
	public function index(){
		$characters = Character::all();

		return response()->json($characters);
	}

	public function findCharacter($id){
		$character = Character::find($id);

    if ($character) {
			return response()->json($character, 200);
    }else{
    	return response()->json(["message" => "Character not found"], 404);
		}

	}


	public function saveCharacter(Request $request){

		$validated = $request->validate([
			'name' => 'required|string|unique:characters,name',
			'gender' => 'required|string',
			'band' => 'required|string',
			'level' => 'required|string',
			'ateDevilFruit' => 'required|boolean',
			'whichFruit' => 'nullable|json'
		]);

		if ($validated) {

			$character = Character::create([
				'name' => $request->name,
				'gender' => $request->gender,
				'band' => $request->band,
				'level' => $request->level,
				'ateDevilFruit' => $request->ateDevilFruit,
				'whichFruit' => $request->whichFruit ? $request->whichFruit : null,
			]);

			return response()->json($character, 201);


		}else{
			return response()->json(["message" => "Error data"], 400);
		}

	}


	public function updateCharacter(Request $request, $id){
		
		$character = Character::findOrFail($id);

		$validated = $request->validate([
			'name' => 'string|unique:characters,name',
			'gender' => 'string',
			'band' => 'string',
			'level' => 'string',
			'ateDevilFruit' => 'boolean',
			'whichFruit' => 'array',
		]);

		if ($validated) {
			$character->update([
				'name' => $request->name,
				'gender' => $request->gender,
				'band' => $request->band,
				'level' => $request->level,
				'ateDevilFruit' => $request->ateDevilFruit,
				'whichFruit' => json_encode($request->whichFruit),
			]);

		}else{

			return response()->json(["message" => "Error updating data"], 400);
		}
	}


	public function deleteCharacter($id) {
		$character = Character::findOrFail($id); 
		$name = $character->name;

    
		if ($character->delete()) {
			return response()->json(["message" => "Successfully deleted character: $name"], 200);
		}else{
			return response()->json(["message" => "error deletion"], 500);
		}

	}
}
