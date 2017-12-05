<?php

namespace App\Models;

use App\Models\Presenters\CommunitiesPresenter;
use App\Models\Traits\HasSlug;
use Spatie\MediaLibrary\Media;
use Spatie\Tags\HasTags;

class Communities extends Model
{
    use HasSlug, HasTags, CommunitiesPresenter;

    protected $with = ['media', 'tags'];
    protected $dates = ['publish_date'];

    public $tagTypes = ['communityCategory', 'communityTag'];
    public $translatable = ['name', 'text', 'slug', 'meta_values'];

    protected $mediaLibraryCollections = ['images', 'downloads'];

    public function registerMediaConversions(Media $media = null)
    {
        parent::registerMediaConversions();

        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->optimize()
            ->performOnCollections('images');
    }
}
