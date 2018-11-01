<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder {

	public function run() {
		$faker = Faker::create();
		foreach (range(1, 50) as $index) {
			DB::table('posts')->insert([
				'title' => $faker->name,
				'subtitle' => $faker->name,
				'content_raw' => implode($faker->paragraphs(5)),
				'post_image' => 'https://picsum.photos/1600/900/?random',
				'meta_description' => $faker->word,
				'author' => $faker->name,
				'category' => $faker->numberBetween($min = 1, $max = 10),
				'slug' => $faker->name,
				'is_draft' => '0',
				'published_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now(),
			]);
		}
	}
}
