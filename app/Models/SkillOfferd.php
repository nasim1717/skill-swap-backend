<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillOfferd extends Model
{
    protected $fillable = [
        'user_id',
        'skills',
    ];
}
