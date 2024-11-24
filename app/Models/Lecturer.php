<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number'];

    /**
     * Relasi ke model Course (one-to-many).
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
