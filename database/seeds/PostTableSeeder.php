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
				'post_image' => 'https://d1bvpoagx8hqbg.cloudfront.net/originals/erasmus-experience-skopje-macedonia-greet-fc92b3bb934834b4df31453c40c8b61d.jpg',
				'meta_description' => $faker->word,
				'user_id' => '1',
				'category' => $faker->numberBetween($min = 1, $max = 10),
				'views' => $faker->numberBetween($min = 1, $max = 9999),
				'slug' => $faker->name,
				'is_draft' => '0',
				'published_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now(),
			]);
		}
	}
}
