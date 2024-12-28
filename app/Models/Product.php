<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, LogsActivity, HasTranslations;
    public $translatable = [
        // 'name',
        // 'description',
        // 'content'
    ];

    protected $fillable = ['name', 'product_catefory_id', 'image', 'description', 'content','product_category_id', 'package_size', 'status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => 'Product with name :subject.name ' . $eventName)
            ->useLogName('Products');
    }

    public function product_category()
    {
        return $this->belongsTo(Product_categories::class);
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

    public function service()
    {
        return $this->belongsTo(Service::class, 'product_category_id', 'id');
    }
}
