<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','id_jabatan'];

    public function relasijabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan'); 
    }
}
