<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Scopes\ActiveOfficeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    protected $table = 'offices';

    protected $fillable = [
        'name', 'address',
        'department_id', 'faculty_id',
        'active',
        'added_by'
    ];

    protected $casts = [
        'created_at' => 'datetime:D, d M Y H:i:s',
        'updated_at' => 'datetime:D, d M Y H:i:s',
        'active' => 'boolean',
        'approved' => 'boolean',
    ];


    protected static function boot()
    {

        parent::boot();

        self::creating(function ($model) {
            $model->added_by = auth()->user()->id ?? 1;
        });
    }

    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
