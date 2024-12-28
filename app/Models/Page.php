<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'parent_id', 'status', 'order', 'link'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => 'Page with name :subject.name '.$eventName)
            ->useLogName('Pages');
    }

    public function parent()
    {
        return $this->belongsTo(Self::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Self::class, 'parent_id')->orderBy('name');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function scopeMainPages($query) {
        return $query->where('parent_id', 0);
    }

    public function scopeWithoutHome($query) {
        return $query->where('name', '!=', 'home');
    }

    public function scopeActive() { 
        return $this->where('status', 1);
    }

    public function scopeNotActive() { 
        return $this->where('status', 0);
    }

    public function getRootNameAttribute()
    {
        if($this->parent_id > 0) {
            return $this->parent->name.' > '.$this->parent->RootName();
        }

        return;
    }

    public function getStatusNameAttribute()
    {
        return $this->status == 1 ? 'active' : 'not active';
    }
}
