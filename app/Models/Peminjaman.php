<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'jumlah','tanggal_pinjam','nama_peminjam','status','id_buku'];
    public $timestamps = true;

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
