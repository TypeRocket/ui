<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPPost;

class Post extends WPPost
{
    public const POST_TYPE = 'post';
    protected $closed = true;

    public function categories()
    {
        return $this->belongsToTaxonomy(Category::class, 'category');
    }

    public function tags()
    {
        return $this->belongsToTaxonomy(Tag::class, 'post_tag');
    }
}
