<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name','gender','state','city','address','skill'
    ];

    
    public function empdetail()
    {
        return $this->hasMany('App\Models\EmpDetail', 'emp_id');
    }

}
