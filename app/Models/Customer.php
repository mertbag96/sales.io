<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'address'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'phone' => 'string',
        'address' => 'string'
    ];

    // Boot
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($customer) {
            $customer->user()->delete();
        });
    }

    /**
     * Get the user associated with the customer.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
