<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, LogsActivity, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'type', 'status'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'type', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => 'User with name :subject.name '.$eventName)
            ->useLogName('User');
    }

    public function scopeActive() { 
        return $this->where('status', 1);
    }

    public function scopeNotActive() { 
        return $this->where('status', 0);
    }

    public function getStatusNameAttribute()
    {
        return $this->status == 1 ? 'active' : 'not active';
    }
}
