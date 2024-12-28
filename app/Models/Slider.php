<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, LogsActivity, HasTranslations;
    public $translatable = [
        'title',
        'subtitle',
        'description',
        'link_title',
        'link'
    ];

    protected $fillable = ['image', 'title','subtitle', 'description', 'link_title', 'link', 'order'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => 'Slide with title :subject.title ' . $eventName)
            ->useLogName('Slides');
    }
}
