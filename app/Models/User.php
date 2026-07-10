<?php

namespace App\Models;

use App\Models\Scopes\ExcludeSuperAdminScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    /**
     * Summary of hidden
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Summary of casts
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    /**
     * Summary of boot
     */
    protected static function boot()
    {
        parent::boot();

        // list of model event
        // make sure uuid is created if not exists
        // make sure email is lowercase
        // make sure username is lowercase
        static::saving(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
            $model->email = strtolower($model->email);
            $model->username = strtolower($model->username);
        });
    }

    /**
     * Summary of getRouteKeyName
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Summary of scopeStandard
     * @param mixed $query
     * @return mixed
     */
    public function scopeStandard($query)
    {
        return $query->withGlobalScope(ExcludeSuperAdminScope::class);
    }

    /**
     * Summary of scopeSuperadmin
     * @param mixed $query
     * @return mixed
     */
    public function scopeSuperadmin($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('name', 'superadmin');
        });
    }

    /**
     * Summary of getRoleBadgeAttribute
     * Required bootstrap icons
     * @return string
     */
    public function getRoleBadgeAttribute()
    {
        if ($this->roles->first()->name == "superadmin") {
            $icon = "<i class='bi bi-shield-lock-fill'></i> ";
            $color = 'badge-danger';
        } else if ($this->roles->first()->name == "admin") {
            $icon = "<i class='bi bi-shield-lock-fill'></i> ";
            $color = 'badge-success';
        } else {
            $icon = "<i class='bi bi-person-fill'></i> ";
            $color = 'badge-info';
        }
        return '<span class="status-badge badge ' . $color . '">' . $icon . ucfirst($this->roles->first()->name) . '</span>';
    }
}