<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeforeAccept extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'before_accept';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'hostuser_id',
        'start_time',
        'end_time',
        'total_amount',
    ];

    /**
     * Get the home associated with the BeforeAccept.
     */
    public function home()
    {
        return $this->belongsTo(Home::class, 'home_id');
    }

    /**
     * Get the user associated with the BeforeAccept.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the host user associated with the BeforeAccept.
     */
    public function hostuser()
    {
        return $this->belongsTo(User::class, 'hostuser_id');
    }
}