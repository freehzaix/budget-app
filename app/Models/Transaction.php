<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'motif',
        'montant',
        'user_id',
        'type_id',
    ];

    public function types(): HasMany
    {
        return $this->hasMany(Type::class, 'type_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }

}
