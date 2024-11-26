<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $with = ['grade'];
    public function grade(): BelongsTo{
        return $this->belongsTo(Grade::class);
    }
    public function departement(): BelongsTo{
        return $this->belongsTo(Departement::class);
    }


}