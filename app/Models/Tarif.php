<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['id', 'jenis_kendaraan', 'tarif_jam_pertama', 'tarif_jam_berikutnya'])]

class Tarif extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = 'tarifs';

    public function areaParkir(): HasMany
    {
        return $this->hasMany(AreaParkir::class);
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }

    protected function casts(): array
    {
        return [
            'tarif_jam_pertama' => 'integer',
            'tarif_jam_berikutnya' => 'integer',
        ];
    }
}
