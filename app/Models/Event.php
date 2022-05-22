<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $fillable = ['title', 'description', 'user_id', 'image', 'start_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventUser()
    {
        return $this->hasMany(EventUsers::class);
    }
}
