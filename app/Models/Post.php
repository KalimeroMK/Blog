<?php

namespace App\Models;

use App\Services\Markdowner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Define the date field.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'content_raw',
        'content_html',
        'post_image',
        'meta_description',
        'layout',
        'creator',
        'slug',
        'is_draft',
        'published_at',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'slug' => 'string',
        'title' => 'string',
        'subtitle' => 'string',
        'content_raw' => 'string',
        'content_html' => 'string',
        'post_image' => 'string',
        'meta_description' => 'string',
        'layout' => 'string',
        'is_draft' => 'boolean',
        'creator' => 'integer',

        'published_at' => 'datetime:Y-m-d',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'layout',
    ];

    /**
     * Get the feed items.
     *
     * @return collection
     */
    public static function getFeedItems()
    {
        return self::allPublishedPosts()->get();
    }

    /**
     * Set the title attribute and automatically the slug.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param string $title
     * @param mixed $extra
     */
    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title . '-' . $extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);

            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Set the HTML content automatically when the raw content is set.
     *
     * @param string $value
     */
    public function setContentRawAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);
    }

    public function tagLinks($base = '/?tag=%TAG%')
    {
        $tags = $this->tags()->pluck('tag')->all();
        $return = [];

        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a class="badge" href="' . $url . '">' . e($tag) . '</a>';
        }

        return $return;
    }


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag_pivot');
    }


    /**
     * Model RSS feed items to return.
     *
     * @return FeedItem
     */
    public function toFeedItem()
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->content_html,
            'updated' => $this->updated_at,
            'link' => $this->slug,
            'post_id' => $this->id,
        ]);
    }


    public
    function images()
    {
        return $this->belongsTo('App\Models\Sliders', 'id', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function cat()
    {
        return $this->belongsTo('App\Models\Category', 'category');
    }

}
