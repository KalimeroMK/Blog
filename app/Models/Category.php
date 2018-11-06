<?php

namespace App\Models;

class Category extends \Baum\Node {

	public $timestamps = false;
	protected $fillable = array('name', 'parent_id', 'slug', 'file', 'filename', 'image', 'description');

	public static function getTree($categories) {

		$lists = '<ul>';
		foreach ($categories as $category) {
			$lists .= self::renderNode($category);
		}

		$lists .= '</ul>';
		return $lists;
	}

	public static function renderNode($node) {
		$list = '<li><a href="/admin/categories/' . $node->id . '/edit">' . $node->name;
		if ($node->children()->count() > 0) {
			$list .= '<ul>';
			foreach ($node->children as $child) {
				$list .= self::renderNode($child);
			}

			$list .= "</ul>";
		}

		$list .= "</a></li>";
		return $list;
	}

	public static function getTreeHP($categories) {
		$lists = '';
		foreach ($categories as $category) {
			$lists .= self::renderNodeHP($category);
		}

		$lists .= '';
		return $lists;
	}

	public static function renderNodeHP($node) {
		$list = '<li class="drop-down"><a href="/categories/' . $node->slug . '" >' . $node->name . '</a>';
		if ($node->children()->count() > 0) {
			$list .= '<ul class="drop-down-menu drop-down-inner">';
			foreach ($node->children as $child) {
				$list .= self::renderNodeHP($child);
			}

			$list .= "</ul>";
		}

		$list .= "</li>";
		return $list;
	}

	public function product() {
		return $this->belongsTo('App\Models\Product', 'category');
	}
}
