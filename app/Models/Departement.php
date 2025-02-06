<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = ['nama','descrip', 'grade_id', 'departement_id'];


    public function students(): HasMany
    {
        return $this->hasMany(Student::class,'department_id');
    }
    
}
