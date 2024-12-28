<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class service extends Model
{
    use HasFactory, LogsActivity, HasTranslations, SoftDeletes;
    protected $table = 'services';


    public $translatable = [
        'name',
        'shortdescription',
        'description'
    ];

    protected $fillable = ['name', 'shortdescription', 'description', 'image'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => 'Service with name :subject.name ' . $eventName)
            ->useLogName('Service');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}
