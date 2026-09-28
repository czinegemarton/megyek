<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;

    /**
     * A tömegesen kitölthető attribútumok.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_county',
        'name',
        'zip_code',
        'population',
    ];

    /**
     * Az attribútumok típuskonverziói.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'population' => 'integer',
        ];
    }

    /**
     * A városhoz tartozó megye.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\County, \App\Models\City>
     */
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class, 'id_county');
    }
}
