<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillOfferd extends Model
{
    use HasFactory;

    protected $table    = 'skills_offerd';
    protected $fillable = [
        'user_id',
        'skills',
    ];
}
