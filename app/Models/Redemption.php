<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Redemption extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'telephone',
        'address_one',
        'address_two',
        'city',
        'county',
        'country',
        'postcode',
        'requires_shipping',
        'gross',
        'vat',
        'tax',
        'ni',
        'net',
        'transaction_id',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($redemption) {
            $redemption->order_number = \Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();;
    }

    public function rewards()
    {
        return $this->belongsToMany(Reward::class)->withTrashed()->withPivot('quantity', 'points');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
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
        return $this->rewards->sum(function ($reward) {
            return $reward->pivot->quantity * $reward->points;
        });
    }

    public function getNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }
}
