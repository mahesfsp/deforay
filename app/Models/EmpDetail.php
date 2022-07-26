<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpDetail extends Model
{
    use HasFactory;
    protected $table = 'emp_details';
    protected $fillable = [
        'emp_id','cmpname','salary','exp','fromyear','toyear'
    ];
}
