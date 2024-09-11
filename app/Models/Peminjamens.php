<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamens extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_peminjam','id_buku', 'jumlah_pinjam','tanggal_pinjam','batas_pinjam','tanggal_kembali','status'];
    public $timestamps = true;

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }
}
