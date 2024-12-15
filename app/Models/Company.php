<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone',
        'address',
        'website'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'phone' => 'string',
        'address' => 'string',
        'website' => 'string'
    ];

    // Boot method to handle cascading delete
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($company) {
            $company->users()->delete();
        });
    }

    // Format the created_at value
    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('d.m.Y');
    }

    // Format the updated_at value
    public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->format('d.m.Y');
    }

    // Human-readable created_at
    public function getCreatedAtHumanAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    // Define the mutator for the phone attribute
    public function setPhoneAttribute($value)
    {
        $formattedPhone = preg_replace('/^(\+90|0)/', '', $value);
        $this->attributes['phone'] = $formattedPhone;
    }

    /**
     * Get the users associated with the company.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
