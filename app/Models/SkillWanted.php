<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillWanted extends Model
{
    use HasFactory;
    protected $table    = 'skills_wanted';
    protected $fillable = [
        'skills',
        'user_id',
    ];
}
