<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'company_category_id',
        'is_published',
    ];

    public function company_category()
    {
        return $this->belongsTo(CompanyCategory::class)->withTrashed();
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Membership::class)->withTrashed();;
    }
}
