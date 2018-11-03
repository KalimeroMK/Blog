<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostTagPivotTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */

	public function run() {
		$faker = Faker::create();
		foreach (range(1, 250) as $index) {
			DB::table('post_tag_pivot')->insert([
				'post_id' => $faker->numberBetween($min = 1, $max = 50),
				'tag_id' => $faker->numberBetween($min = 1, $max = 100),

			]);
		}
	}

}