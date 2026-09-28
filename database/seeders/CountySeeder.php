<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Magyarország 19 vármegyéje.
     *
     * A címer mezőben (badge) - valódi címerképek helyett, szerzői jogi
     * okokból - egy egyszerű, a megye rövidítését megjelenítő placeholder
     * kép URL-je szerepel, hogy a listázó nézet ténylegesen tudjon képet
     * megjeleníteni.
     *
     * @var list<array{name: string, abbr: string}>
     */
    private const COUNTIES = [
        ['name' => 'Bács-Kiskun megye', 'abbr' => 'BK'],
        ['name' => 'Baranya megye', 'abbr' => 'BA'],
        ['name' => 'Békés megye', 'abbr' => 'BE'],
        ['name' => 'Borsod-Abaúj-Zemplén megye', 'abbr' => 'BAZ'],
        ['name' => 'Csongrád-Csanád megye', 'abbr' => 'CS'],
        ['name' => 'Fejér megye', 'abbr' => 'FE'],
        ['name' => 'Győr-Moson-Sopron megye', 'abbr' => 'GYMS'],
        ['name' => 'Hajdú-Bihar megye', 'abbr' => 'HB'],
        ['name' => 'Heves megye', 'abbr' => 'HE'],
        ['name' => 'Jász-Nagykun-Szolnok megye', 'abbr' => 'JNSZ'],
        ['name' => 'Komárom-Esztergom megye', 'abbr' => 'KE'],
        ['name' => 'Nógrád megye', 'abbr' => 'NO'],
        ['name' => 'Pest megye', 'abbr' => 'PE'],
        ['name' => 'Somogy megye', 'abbr' => 'SO'],
        ['name' => 'Szabolcs-Szatmár-Bereg megye', 'abbr' => 'SZSZB'],
        ['name' => 'Tolna megye', 'abbr' => 'TO'],
        ['name' => 'Vas megye', 'abbr' => 'VA'],
        ['name' => 'Veszprém megye', 'abbr' => 'VP'],
        ['name' => 'Zala megye', 'abbr' => 'ZA'],
    ];

    /**
     * A seeder futtatása.
     */
    public function run(): void
    {
        foreach (self::COUNTIES as $county) {
            County::updateOrCreate(
                ['name' => $county['name']],
                ['badge' => "https://placehold.co/96x96/1b4f72/ffffff?text={$county['abbr']}"]
            );
        }
    }
}
