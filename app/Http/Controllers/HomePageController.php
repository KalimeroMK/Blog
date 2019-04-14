<?php

namespace App\Http\Controllers;

use App\Models\Category as Category;
use App\Models\Post;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\Tag;
use App\Models\User as User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomePageController extends Controller {
	/**
	 * Display a listing of the published blog posts.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$users = User::all();
		$settings = Settings::firstOrFail();
		$post = Post::orderBy('id', 'desc')->where('is_draft', '=', '0')->paginate(27);
		$tag = tag::all();
		$data = ["status" => "success", "post" => $post,"tag" => $tag, "users" => $users, "settings" => $settings];
		// dd($data);
		return view('main.homepage')->with($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param string $slug
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function post($slug) {
		$settings = Settings::firstOrFail();
		$tag = tag::all();
		$users = User::all();
		$post = Post::where('slug', '=', $slug)->first();
		Post::where('slug', $slug)->update(['views' => $post->views + 1]);
		$sliders = Sliders::where('post_id', '=', $post->id)->get();
		$allcategories = Category::get();
		$data = ["sliders" => $sliders, "post" => $post, "allcategories" => $allcategories, "tag" => $tag, "settings" => $settings];
//        dd($data);
		return view('main.posts')->with($data);

	}

	public function tags($slug) {
		$settings = Settings::firstOrFail();

		$allcategories = Category::get();
		$tag = Tag::where('tag', $slug)->firstOrFail();
		$reverse_direction = (bool) $tag->reverse_direction;

		$post = Post::where('published_at', '<=', Carbon::now())
			->whereHas('tags', function ($q) use ($tag) {
				$q->where('tag', '=', $tag->tag);
			})
			->where('is_draft', 0)
			->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
			->paginate(10);

		$data = ["post" => $post, "allcategories" => $allcategories, "settings" => $settings];

		return view('main.tags')->with($data);
	}

	public
	function categories($slug) {
		// $settings = Settings::firstOrFail();
		$users = User::all();
		$settings = Settings::firstOrFail();

		if ($slug == "all") {
			$post = Post::all();
			$allcategories = Category::get();
			$data = ["post" => $post, "allcategories" => $allcategories, "settings" => $settings];
			return view('main.allcategories')->with($data);
		} else {
			$category = Category::where('slug', '=', $slug)->first();
			$post = Post::orderBy('id', 'desc')->where('is_draft', '=', '0')->where('category', '=', $category->id)->paginate(5);

		}

		$allcategories = Category::get();
		$data = ["category" => $category, "post" => $post, "allcategories" => $allcategories, "settings" => $settings];
		return view('main.categories')->with($data);
	}

	/**
	 * Get the RSS feed.
	 *
	 * @param RssFeed $feed
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function rss(RssFeed $feed) {
		$rss = $feed->getRSS();

		return response($rss)->header('Content-type', 'application/rss+xml');
	}
}
