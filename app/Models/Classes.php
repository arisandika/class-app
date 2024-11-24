<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = ['class_name', 'description'];

    /**
     * Relasi ke model Course (many-to-many).
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'class_course');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
