<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Feeds;
class FeedController extends Controller {
    public function index()
    {
        $feed = Feeds::make(['https://www.freefullrss.com/feed.php?url=https%3A%2F%2Fpokajanie.mk%2Ffeed%2F&max=&links=preserve&exc=&submit=Create+Full+Text+RSS'
        ], 50, true); // if RSS Feed has invalid mime types, force to read
        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );


        return view('admin.feed.index')->with($data);


    }
}
