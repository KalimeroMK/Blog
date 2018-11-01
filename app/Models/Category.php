<?php

namespace App\Models;

class Category extends \Baum\Node
{

    public $timestamps = false;
    protected $fillable = array('name', 'parent_id', 'slug', 'file', 'filename', 'image', 'description');

    public static function getTree($categories)
    {

        $lists = '<ul class="dropdown">';
        foreach ($categories as $category)
            $lists .= self::renderNode($category);
        $lists .= '</ul>';
        return $lists;
    }

    public static function renderNode($node)
    {
        $list = '<li><a href="/admin/categories/' . $node->id . '/edit">' . $node->name;
        if ($node->children()->count() > 0) {
            $list .= '<ul>';
            foreach ($node->children as $child)
                $list .= self::renderNode($child);
            $list .= "</ul>";
        }

        $list .= "</a></li>";
        return $list;
    }

    public static function getTreeHP($categories)
    {
        $lists = '<li class="dropdown">';
        foreach ($categories as $category)
            $lists .= self::renderNodeHP($category);
        $lists .= '</li>';
        return $lists;
    }

    public static function renderNodeHP($node)
    {
        $list = '<li class="dropdown"><a href="/categories/' . $node->slug . '" class="nav-link dropdown-toggle" id="fifth-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $node->name . '</a>';
        if ($node->children()->count() > 0) {
            $list .= '<ul class="dropdown-menu" aria-labelledby="fifth-dropdown">';
            foreach ($node->children as $child)
                $list .= self::renderNodeHP($child);
            $list .= "</ul>";
        }

        $list .= "</li>";
        return $list;
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Post', 'category');
    }
}

