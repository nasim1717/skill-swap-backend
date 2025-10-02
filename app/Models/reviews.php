<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $fillable = [
        'reviewer_id',
        'reviewed_user_id',
        'rating',
        'comment',
    ];
}
