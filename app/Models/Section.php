<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory, LogsActivity, HasTranslations;
    public $translatable = [
        'description',
        'title',
        'buton_txt',
        'button_url',
        'col_1',
        'col_title_1',
        'col_title_2',
        'col_title_3',
        'col_2',
        'col_3'
    ];
    protected $fillable = [
        'page_id','order','type',
        
        
        'description', 'status',  'title',
        'background_color',
        'background_image',
        'section_margin_top',
        'icon',
        'width',
        'image',
        'image_frame',
        'image_position',
        'col_icon_1',
        'col_icon_2',
        'col_icon_3',
        'col_background_1',
        'col_background_2',
        'col_background_3',
        'col_background_1',
        'col_background_2',
        'col_background_3',
        'col_1',
        'col_2',
        'col_3'
        
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => 'Section of page :subject.page.name ' . $eventName)
            ->useLogName('Sections');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function scopeActive()
    {
        return $this->where('status', 1);
    }

    public function scopeNotActive()
    {
        return $this->where('status', 0);
    }

    public function getStatusNameAttribute()
    {
        return $this->status == 1 ? 'active' : 'not active';
    }
}
