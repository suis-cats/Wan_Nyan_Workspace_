<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Post extends Model
{
    protected $fillable = ['id', 'post_number', 'adress','buisiness_start_time','buisiness_end_time','notes','user_id','image_path','price_per_minute'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



