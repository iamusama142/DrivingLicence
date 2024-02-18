<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'exam_id',
        'questions',
        'options_a',
        'options_b',
        'options_c',
        'options_d',
        'correct_options'
    ];
    use HasFactory;
}
