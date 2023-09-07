<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SearchKeywordProduct extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'search_keyword_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'keyword_id',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id')->first();
    }

}
