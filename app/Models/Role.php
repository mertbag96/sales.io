<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    // Boot method to handle cascading delete
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($role) {
            $role->users()->delete();
        });
    }

    // Format the created_at value
    public function getformattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('d.m.Y');
    }

    // Format the updated_at value
    public function getformattedUpdatedAtAttribute(): string
    {
        return $this->created_at->format('d.m.Y');
    }

    // Human-readable created_at
    public function getCreatedAtHumanAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get the users associated with the role.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
