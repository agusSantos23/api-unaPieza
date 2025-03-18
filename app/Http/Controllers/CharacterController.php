<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
	public function index()
	{
		$characters = Character::all();

		return response()->json($characters);
	}


	public function saveCharacter(Request $request)
	{

		$validated = $request->validate([
			'name' => 'required|string|unique:characters,name',
			'band' => 'required|string',
			'level' => 'required|string',
			'ateDevilFruit' => 'required|boolean',
			'whichFruit' => 'array',
		]);

		if ($validated) {

			$character = Character::create([
				'name' => $request->name,
				'band' => $request->band,
				'level' => $request->level,
				'ateDevilFruit' => $request->ateDevilFruit,
				'whichFruit' => json_encode($request->whichFruit),
			]);

		}else{
			return response()->json(["message" => "Error data"], 400);
		}



		return response()->json($character, 201);
	}
}
