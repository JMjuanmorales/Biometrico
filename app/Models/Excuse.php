<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Excuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'absence_date',
        'justification',
        'document_path',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
