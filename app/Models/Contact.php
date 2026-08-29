<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// The Contact model represents a single message submitted through the contact form.
// It extends Laravel's base Model class so we can interact with the database easily.

class Contact extends Model
{
    /**
     * $fillable tells Laravel which columns are allowed to be mass-assigned.
     * This protects against accidental overwrites of sensitive columns.
     * Without this, calling Contact::create([...]) would fail.
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
