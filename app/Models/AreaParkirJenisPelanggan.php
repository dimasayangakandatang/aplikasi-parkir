<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['area_parkir_id', 'jenis_pelanggan_id'])]

class AreaParkirJenisPelanggan extends Model
{
     use HasUuids, SoftDeletes;

     protected $table = 'area_parkir_jenis_pelanggan';
}
