<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Relasi ke anggota keluarga
    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
