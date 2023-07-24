<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\User;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'number'
    ];

    public function students()
    {
        return $this->hasMany(User::class, 'group_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
