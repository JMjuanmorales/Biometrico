<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;

class role_user extends Model
{
    use HasFactory;
    Protected $fillable=['user_id', 'role_id'];
}
