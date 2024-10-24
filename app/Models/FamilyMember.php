<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'hubungan_keluarga',
        'ayah_id',
        'ibu_id',
        'suami_id',
        'istri_id',
    ];

    public function ayah()
    {
        return $this->belongsTo(FamilyMember::class, 'ayah_id');
    }

    public function ibu()
    {
        return $this->belongsTo(FamilyMember::class, 'ibu_id');
    }

    public function suami()
    {
        return $this->belongsTo(FamilyMember::class, 'suami_id');
    }

    public function istri()
    {
        return $this->belongsTo(FamilyMember::class, 'istri_id');
    }
}
