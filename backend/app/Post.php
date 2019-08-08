<?php

namespace App;

/**
 * @property mixed body
 */
class Post extends Model
{
    protected $fillable = ['body'];

    // Create Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
