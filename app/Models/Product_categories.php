<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Product_categories extends Model
{
    use HasFactory;

    use HasFactory, LogsActivity, HasTranslations;
    public $translatable = [
        // 'name'
    ];

    protected $fillable = ['name', 'status', 'order'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => 'Product Type with name :subject.name ' . $eventName)
            ->useLogName('Product Type');
    }


    public function products()
    {
        return $this->hasMany(Product::class , 'product_category_id');
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
