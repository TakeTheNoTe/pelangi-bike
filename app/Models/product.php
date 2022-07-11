<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'name',
        'price',
        'category_id',
        'status',
        'image',
        'description',
    ];

    public $timestamps = true;

    public function productCategory()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
