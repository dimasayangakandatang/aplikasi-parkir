<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['id', 'pemilik', 'plat_nomor', 'jenis_kendaraan', 'warna', 'jenis_pelanggan_id'])]

class Kendaraan extends Model
{
    use HasUuids, SoftDeletes;

    public function jenisPelanggan(): BelongsTo
    {
        return $this->belongsTo(JenisPelanggan::class);
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
