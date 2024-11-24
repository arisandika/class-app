<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_name', 'lecturer_id'];

    /**
     * Relasi ke model Student (many-to-many).
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course');
    }

    /**
     * Relasi ke model Lecturer (many-to-one).
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    /**
     * Relasi ke model Class (many-to-many).
     */
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_course');
    }
}
