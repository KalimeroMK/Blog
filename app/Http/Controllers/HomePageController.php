<?php

namespace App\Http\Controllers;

use App\Models\Category as Category;
use App\Models\Post;
use App\Models\Sliders;
use App\Models\Tag;
use App\Models\User as User;
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

    public function tags(Request $request, $slug)
    {
        $allcategories = Category::get();
        $categories = Category::roots()->get();
        $tree = Category::getTreeHP($categories);

        $tag = tag::all();
        $post = $tag->posts;
        $data = ["post" => $post, "tree" => $tree, "categories" => $categories, "allcategories" => $allcategories, "tag" => $tag];


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
