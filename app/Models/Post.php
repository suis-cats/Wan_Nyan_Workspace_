<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'post_numbar', 'adress','buisiness_start_time','buisiness_end_time','notes','user_id','image_path','price_per_minute'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



