<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed title
 */
class Topic extends Model
{
    // order topic by ascending or descending order
    use Orderable;

    // fillable property
    protected $fillable = ['title'];

    // Create Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
