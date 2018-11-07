<?php

namespace App\Http\Controllers;

use App\Models\Category as Category;
use App\Models\Post;
use App\Models\Sliders;
use App\Models\Tag;
use App\Models\User as User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class HomePageController extends Controller
{
    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        $post = Post::orderBy('id', 'desc')->where('is_draft', '=', '0')->paginate(27);
        $tag = tag::all();
        $categories = Category::roots()->get();
        $tree = Category::getTreeHP($categories);
        $data = ["status" => "success", "post" => $post, "categories" => $categories, "tree" => $tree, "tag" => $tag, "users" => $users];
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
    public function post($slug)
    {
        $tag = tag::all();
        $users = User::all();
        $post = Post::where('slug', '=', $slug)->first();
        Post::where('slug', $slug)->update(['views' => $post->views + 1]);
        $sliders = Sliders::where('post_id', '=', $post->id)->get();
        $allcategories = Category::get();
        $categories = Category::roots()->get();
        $tree = Category::getTreeHP($categories);
        $data = ["sliders" => $sliders, "post" => $post, "tree" => $tree, "categories" => $categories, "allcategories" => $allcategories, "tag" => $tag];
//        dd($data);
        return view('main.posts')->with($data);

    }

    public function tags($slug)
    {
        $allcategories = Category::get();
        $categories = Category::roots()->get();
        $tree = Category::getTreeHP($categories);
        $tag = Tag::where('tag', $slug)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $post = Post::where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->paginate(10);


        $data = ["post" => $post, "categories" => $categories, "tree" => $tree, "allcategories" => $allcategories];


        return view('main.tags')->with($data);
    }


    public
    function categories($slug)
    {
        // $settings = Settings::firstOrFail();
        $users = User::all();

        if ($slug == "all") {
            $post = Post::all();
            $allcategories = Category::get();
            $categories = Category::roots()->get();
            $tree = Category::getTreeHP($categories);
            $data = ["post" => $post, "tree" => $tree, "categories" => $categories, "allcategories" => $allcategories];
            return view('main.allcategories')->with($data);
        } else {
            $category = Category::where('slug', '=', $slug)->first();
            $post = Post::orderBy('id', 'desc')->where('is_draft', '=', '0')->where('category', '=', $category->id)->paginate(5);

        }

        $allcategories = Category::get();
        $categories = Category::roots()->get();
        $tree = Category::getTreeHP($categories);
        $data = ["category" => $category, "post" => $post, "tree" => $tree, "categories" => $categories, "allcategories" => $allcategories];
        return view('main.categories')->with($data);
    }

    /**
     * Get the RSS feed.
     *
     * @param RssFeed $feed
     *
     * @return \Illuminate\Http\Response
     */
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)->header('Content-type', 'application/rss+xml');
    }
}
