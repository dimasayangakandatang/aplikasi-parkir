<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id', 'user_id',  'action'])]

class Log extends Model
{
    use HasUuids;

    protected $table = 'logs';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}