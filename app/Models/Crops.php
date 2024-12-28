<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;
class Crops extends Model
{
    use HasFactory, LogsActivity, HasTranslations;
    public $translatable = [
        'name',
        'description',
        'content' 
    ]; 

    protected $fillable = ['name',   'image', 'description', 'content', 'status'];

    protected $table = 'crops';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => 'Fish with name :subject.name '.$eventName)
            ->useLogName('Fishes');
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
