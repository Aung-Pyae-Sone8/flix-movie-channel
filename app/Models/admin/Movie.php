<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\RecentView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function recentViews()
    {
        return $this->hasMany(RecentView::class);
    }

    protected $fillable = ['name','release_year','genre_id','director','description','image','trailer', 'type', 'movie_url','rating'];
}
