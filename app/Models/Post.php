<?php

namespace App\Models;

use Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'view_count', 'description', 'category_id', 'feature_image', 'likes', 'summary', 'first_image', 'second_image', 'third_image', 'fourth_image', 'seo_meta_keywords', 'seo_meta_description'];
    protected $dates    = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createTags($str)
    {
        $tags = explode(",", $str);
        $tagIds = [];

        foreach ($tags as $tag)
        {
            $newTag = Tag::firstOrCreate([
                'slug' => str_slug($tag),
                'title' => ucwords(trim($tag))
            ]);

            $tagIds[] = $newTag->id;
        }

        $this->tags()->sync($tagIds);
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('title');
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag) {
            $anchors[] = '<a href="' . route('tag.show', $tag->slug) . '">' . $tag->title . '</a>';
        }
        return implode(", ", $anchors);
    }

    // Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsNumber()
    {
        $commentsNumber = $this->comments->count($label = 'Comment');

        return $commentsNumber . " " . Str::plural($label, $commentsNumber);
    }

    // Published Date
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }

    public function month()
    {
        return Carbon::parse($this->published_at)->format('M');
    }

    public function year()
    {
        return Carbon::parse($this->published_at)->format('Y');
    }

    public function day()
    {
        return Carbon::parse($this->published_at)->day;
    }

    public function publicationLabel()
    {
        if ( ! $this->published_at) {
            return '<span class="label label-warning">Draft</span>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Schedule</span>';
        }
        else {
            return '<span class="label label-success">Published</span>';
        }
    }

    // Scope
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    public static function archives()
    {
        if (env("DB_CONNECTION") === 'pgsql') {
            return static::selectRaw('count(id) as post_count, extract(year from published_at) as year, extract(month from published_at) as month')
                            ->published()
                            ->groupBy('year', 'month')
                            ->orderByRaw('min(published_at) desc')
                            ->get();
        }
        else {
            return static::selectRaw('count(id) as post_count, year(published_at) year, month(published_at) month')
                            ->published()
                            ->groupBy('year', 'month')
                            ->orderByRaw('min(published_at) desc')
                            ->get();

        }
    }

    public function scopeFilter($query, $filter)
    {
        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term) {
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('summary', 'LIKE', "%{$term}%");
                $q->orWhere('description', 'LIKE', "%{$term}%");
            });
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
