<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateSitemapRequest;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\Tag;
use App\Models\User as User;
use App\Models\Post;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.home');
    }
    public function post($slug) {
		$tag = tag::all();
		$users = User::all();
		$post = Post::where('slug', '=', $slug)->first();
		Post::where('slug', $slug)->update(['views' => $post->views + 1]);
		$sliders = Sliders::where('post_id', '=', $post->id)->get();
		$data = ["sliders" => $sliders, "post" => $post, "tag" => $tag];
//        dd($data);
		return view('admin.pages.post')->with($data);

	}

    /**
     * Show the application files manager/uploads dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploads()
    {
        return view('admin.pages.uploads');
    }

    /**
     * Show the application sitemap dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
        $sitemap = base_path('public/sitemap.xml');
        $modified = null;
        $sitemapxml = [];

        if (file_exists($sitemap)) {
            $sitemapxml = simplexml_load_file($sitemap);
            $modified = date('F jS, Y H:i:s', filemtime($sitemap));
        }

        $data = [
            'sitemap'   => $sitemapxml,
            'modified'  => $modified,
        ];

        return view('admin.pages.sitemap', $data);
    }

    /**
     * Generate Sitemap from Artisan Command via Request.
     *
     * @param \App\Http\Requests\GenerateSitemapRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function generateSitemap(GenerateSitemapRequest $request)
    {
        Artisan::call('sitemap:generate', ['limit' => $request->limit]);

        return redirect()->back()->withSuccess(trans('forms.sitemap.messages.success'));
    }
}
