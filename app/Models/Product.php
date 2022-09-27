<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'code',
        'uuid',
        'points',
        'filename',
        'is_published',
        'product_category_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $slug = Str::slug($product->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class)->withTrashed();
    }

    public function product_offer()
    {
        return $this->hasOne(ProductOffer::class)->withTrashed();
    }

    public function getBonusPointsAttribute()
    {
        if (isset($this->product_offer)) {
            return ($this->product_offer->multiplier * $this->points);
        }
        return 0;
    }

    public function getTotalPointsAttribute()
    {
        return $this->points + $this->bonus_points;
    }
}
