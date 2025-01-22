<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    // Explicitly define mass-assignable attributes
    protected $fillable = [
        'title',
        'body',
        'recipient',
        'send_date',
        'is_published',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Automatically load related user model
    protected $with = ['user'];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
