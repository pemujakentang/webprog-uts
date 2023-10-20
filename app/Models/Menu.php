<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'excerpt',
        'image',
        'tag',
        'order_count'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
