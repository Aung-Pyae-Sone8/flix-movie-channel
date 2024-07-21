<?php

namespace App\Models;

use App\Models\User;
use App\Models\admin\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecentView extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public static function addRecentView($userId, $movieId)
    {
        return static::updateOrCreate(
            ['user_id' => $userId, 'movie_id' => $movieId],
            ['created_at' => now(), 'updated_at' => now()]
        );
    }
}
