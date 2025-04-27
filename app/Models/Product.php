<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'name',
        'price',
        'weight',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $slug = Str::slug($product->name);
                $count = Product::where('slug', $slug)->count();

                // If the slug already exists, append a number to it
                if ($count > 0) {
                    $slug = $slug . '-' . ($count + 1);
                }

                $product->slug = $slug;
            }
        });
    }
}
