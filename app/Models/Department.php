<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'head_id',
        'location',
        'phone',
        'email',
    ];

    public function head()
    {
        return $this->belongsTo(Doctor::class, 'head_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
