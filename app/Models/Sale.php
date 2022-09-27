<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'points',
        'bonus_points',
        'sold_at',
        'invoiced_at',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'sold_at' => 'date',
        'invoiced_at' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();;
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    public function scopeRejected($query)
    {
        return $query->whereNotNull('rejected_at');
    }

    public function scopePending($query)
    {
        return $query->whereNull('approved_at')->whereNull('rejected_at');
    }

    public function getStatusAttribute()
    {
        return !is_null($this->approved_at) ? 'approved' : (!is_null($this->rejected_at) ? 'rejected' : 'pending');
    }

    public function getTotalPointsAttribute()
    {
        return $this->points + $this->bonus_points;
    }
}
