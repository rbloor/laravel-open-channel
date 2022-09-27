<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Reward extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'filename',
        'points',
        'is_published',
        'is_physical',
        'reward_category_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($reward) {
            $slug = Str::slug($reward->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $reward->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function reward_category()
    {
        return $this->belongsTo(RewardCategory::class)->withTrashed();
    }

    public function redemptions()
    {
        return $this->belongsToMany(Redemption::class)->withTrashed();
    }
}
