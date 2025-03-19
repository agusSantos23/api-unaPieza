<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DB::table('characters')->insert([
			'name' => 'Luffy',
			'gender' => 'male',
			'band' => 'pirate',
			'level' => 'high',
			'ateDevilFruit' => true,
			"whichFruit" => json_encode('Gomu Gomu')
		]);

		DB::table('characters')->insert([
			'name' => 'Ace',
			'gender' => 'male',
			'band' => 'pirate',
			'level' => 'high',
			'ateDevilFruit' => true,
			'whichFruit' => json_encode('Mera Mera')
		]);
	}
}
