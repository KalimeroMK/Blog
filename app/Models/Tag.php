<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [
		'id',
	];

	/**
	 * Fillable fields for a Profile.
	 *
	 * @var array
	 */
	protected $fillable = [
		'tag',

	];

	/**
	 * Typecasting is awesome.
	 *
	 * @var array
	 */
	protected $casts = [
		'tag' => 'string',

	];

	/**
	 * Add any tags needed from the list.
	 *
	 * @param array $tags List of tags to check/add
	 */
	public static function addNeededTags(array $tags) {
		if (count($tags) === 0) {
			return;
		}

		$found = static::whereIn('tag', $tags)->pluck('tag')->all();

		foreach (array_diff($tags, $found) as $tag) {
			static::create([
				'tag' => $tag,

			]);
		}
	}

	/**
	 * Return a tag link.
	 *
	 * @param string $base
	 *
	 * @return string
	 */
	public function link($base = '/tags/%TAG%') {
		$url = str_replace('%TAG%', urlencode($this->tag), $base);
		$tagLink = '<a href="' . $url . '">' . e($this->tag) . '</a>';

		return $tagLink;
	}

	public function posts() {
		return $this->belongsToMany('App\Models\Post', 'post_tag_pivot');
	}

}
