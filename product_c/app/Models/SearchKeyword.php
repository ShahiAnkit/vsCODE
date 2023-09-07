<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SearchKeyword extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'search_keyword';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'keyword'
    ];

    public function keywordProduct()
   	{
   		return $this->hasMany('App\Models\SearchKeywordProduct', 'keyword_id');
   	}

}
