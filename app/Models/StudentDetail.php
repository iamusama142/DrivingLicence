<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    protected $fillable = [
        'student_id'
    ];
    use HasFactory;
    public function user(){
       return $this->belongsTo(User::class, 'id');
    }
}
