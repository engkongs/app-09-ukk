<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'kategori',

    ];
    public function buku(): HasMany
    {
        return $this->hasMany(buku::class, 'id_kategori', 'id');
    }
}
