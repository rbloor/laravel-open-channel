<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'debit',
        'credit',
        'balance',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $balance = static::latest('id')->value('balance');
            if (!is_null($transaction->credit)) {
                $transaction->balance = $balance + $transaction->credit;
            } else {
                $transaction->balance = $balance - $transaction->debit;
            }
        });
    }

    public function redemption()
    {
        return $this->hasOne(Redemption::class)->withTrashed();
    }
}
