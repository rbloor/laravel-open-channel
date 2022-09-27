<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_one',
        'address_two',
        'city',
        'county',
        'postcode',
        'job_title',
        'telephone',
        'tax_region',
        'tax_bracket',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class)->withTrashed();
    }

    public function user()
    {
        return $this->hasOne(User::class)->withTrashed();;
    }

    public function getPointsBalanceAttribute()
    {
        $earned = $this->user
            ->sales()
            ->approved()
            ->get()
            ->sum('total_points');

        $spent = $this->user
            ->redemptions()
            ->where(function ($query) {
                $query->pending()->orWhere(function ($query) {
                    $query->approved();
                });
            })
            ->get()
            ->sum('total_points');

        return $earned - $spent;
    }

    public function getPointsApprovedBalanceAttribute()
    {
        $earned = $this->user
            ->sales()
            ->approved()
            ->get()
            ->sum('total_points');

        $spent = $this->user
            ->redemptions()
            ->where(function ($query) {
                $query->rejected()->orWhere(function ($query) {
                    $query->approved();
                });
            })
            ->get()
            ->sum('total_points');

        return $earned - $spent;
    }
}
