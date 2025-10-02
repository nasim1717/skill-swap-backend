<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillWanted extends Model
{
    protected $fillable = [
        'skills',
        'user_id',
    ];
}
