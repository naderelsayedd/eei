<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasFactory, LogsActivity, HasTranslations , SoftDeletes;
    protected $table = 'teams';

    public $translatable = [
        'name',
        'job_title',
        'bio'
    ];

    protected $fillable = ['name', 'image', 'job_title', 'facebook_url', 'twitter_url', 'linkedin_url', 'instagram_url', 'bio'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => 'Team with name :subject.name ' . $eventName)
            ->useLogName('Team');
    }
}
