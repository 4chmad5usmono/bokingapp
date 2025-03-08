<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\str;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'name',
        'price',
        'slug',
        'about',
        'photo',
        'icon',
        'duration_in_hour',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function storeServices(): HasMany
    {
        return $this->hasMany(StoreService::class, 'service_id');
    }
}
