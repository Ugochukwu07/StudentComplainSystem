<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'complain', 'ref',
        'student_id', 'status', 'resolved_by',
        'remarks', 'office_id'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function student()
    {
        return $this->hasOne(Profile::class, 'user_id', 'student_id');
    }

    public function resolvedBy()
    {
        return $this->hasOne(User::class, 'id', 'resolved_by');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }
}
