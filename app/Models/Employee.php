<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone_numbers',
        'dietary_preference_id',
    ];
    protected $casts = [
        'phone_numbers' => 'array',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function dietaryPreference(): BelongsTo
    {
        return $this->belongsTo(DietaryPreference::class);
    }
}
