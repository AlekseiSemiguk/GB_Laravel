<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{
    use HasFactory;

    use HasSlug;

    protected $table = 'news';

    protected $fillable = [
        'category_id',
        'news_source_id',
        'title',
        'author',
        'anonce',
        'image',
        'description',
        'date'
    ];

    private static $selectedFields = [
        'id', 'slug', 'title', 'author', 'anonce', 'image', 'description', 'date'
    ];

    protected $dates = [
        'date',
    ];

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

/*    public function getNews(): Collection
    {
        return DB::table($this->table)->get(self::$selectedFields);
    }

    public function getNewsById(int $id): ?object
    {
        return DB::table($this->table)->find($id, self::$selectedFields);
    }

    public function getNewsBySlug(string $slug): ?object
    {
        return DB::table($this->table)->where('slug', $slug)->first(self::$selectedFields);
    }*/

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(100);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function newsSource(): BelongsTo
    {
        return $this->belongsTo(NewsSource::class);
    }

}
