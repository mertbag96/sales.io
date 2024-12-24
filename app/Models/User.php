<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Hash;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'company_id',
        'name',
        'surname',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'role_id' => 'integer',
        'company_id' => 'integer',
        'name' => 'string',
        'surname' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    // Hash the password automatically
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Get user's full name
    public function getFullNameAttribute(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    // Get user's role name
    public function getRoleNameAttribute(): string
    {
        return $this->role->name;
    }

    // Get user's company name (for Company Manager and Company Employee)
    public function getCompanyNameAttribute(): string
    {
        return $this->company?->name;
    }

    // Format the email_verified_at value
    public function getFormattedEmailVerifiedAtAttribute(): string
    {
        $value = $this->email_verified_at;
        $formatted = is_null($value) ? '-' : $value->format('d.m.Y');

        return $formatted;
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

    /**
     * Get the role associated with the user.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the company associated with the user.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the customer associated with the user.
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * Check if the user is the first user.
     */
    public function isFirstUser(): bool
    {
        return $this->id === 1;
    }

    /**
     * Check if the user is Admin.
     */
    public function isAdmin(): bool
    {
        return $this->role_id === 1;
    }

    /**
     * Check if the user is Super Admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->isAdmin() && $this->isFirstUser();
    }

    /**
     * Check if the user is Manager.
     */
    public function isManager(): bool
    {
        return $this->role_id === 2;
    }

    /**
     * Check if the user is Employeer.
     */
    public function isEmployeer(): bool
    {
        return $this->role_id === 3;
    }

    /**
     * Check if the user is Customer.
     */
    public function isCustomer(): bool
    {
        return $this->role_id === 4;
    }

    /**
     * Check if the user can see monitoring.
     */
    public function canSeeMonitoring(): bool
    {
        return $this->isAdmin() || $this->isManager();
    }

    /**
     * Check if the user can manage administration.
     */
    public function canManageAdministration(): bool
    {
        return in_array($this->role_id, [1, 2, 3]);
    }
}
