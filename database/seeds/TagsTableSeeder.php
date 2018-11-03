<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run() {
		$faker = Faker::create();
		foreach (range(1, 50) as $index) {
			DB::table('tags')->insert([
				'tag' => $faker->unique()->word,

			]);
		}
	}

}