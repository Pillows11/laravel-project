<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'grade_id', 'departement_id'];

    public function students() : HasMany{
        return $this->hasMany(Student::class);
    }

    public function departement(): BelongsTo{
        return $this->belongsTo(Departement::class);
    }

}
