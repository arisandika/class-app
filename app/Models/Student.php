<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'nim', 'class_id', 'github', 'portfolio', 'description'];

    /**
     * Relasi ke model Course (many-to-many).
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
