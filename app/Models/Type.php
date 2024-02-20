<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
    
}
