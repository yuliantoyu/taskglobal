<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'file',
        'no_penerimaan_barang',
		'no_surat_jalan',
		'supplier_id',
		'tanggal',
		'karat',
		'berat_real',
		'berat_kotor',
		'total_berat_real',
		'total_berat_kotor',
		'berat_timbangan',
		'selisih',
		'catatan',
		'tipe_pembayaran',
		'harga_beli',
		'jatuh_tempo',
		'nama_pengirim',
		'pic'
    ];
}
