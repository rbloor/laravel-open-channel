<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'filename',
        'banner_title',
        'banner_subtitle',
        'banner_paragraph',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            $slug = Str::slug($page->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $page->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
