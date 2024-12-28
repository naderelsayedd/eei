<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'request_date', 'message', 'answer'];

    public function scopeUnRead() {
        return $this->where('answer', null);
    }
}
