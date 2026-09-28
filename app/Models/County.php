<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    use HasFactory;

    /**
     * A tömegesen kitölthető attribútumok.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'badge',
    ];

    /**
     * A megyéhez tartozó városok.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\City, \App\Models\County>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'id_county');
    }

    /**
     * A megyéhez tartozó városok összlakossága.
     *
     * Csak az adatbázisban szereplő (felvitt) városok lakosságának összege,
     * nem a megye tényleges teljes népessége.
     */
    public function totalPopulation(): int
    {
        return (int) $this->cities()->sum('population');
    }
}
