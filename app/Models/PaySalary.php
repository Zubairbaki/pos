<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaySalary extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function employee(){
        return $this ->belongsTo(Employ::class,'employee_id','id');
    }
}
