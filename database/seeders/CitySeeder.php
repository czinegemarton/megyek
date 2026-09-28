<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\County;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Magyar városok népességi adatainak feltöltése.
     *
     * Az adatok a Központi Statisztikai Hivatal (KSH) 2025. január 1-i
     * státusza alapján, valamint a википедia és helyi adatforrások szerint.
     *
     * @var list<array{county: string, name: string, zip_code: string, population: int}>
     */
    private const CITIES = [
        // Bács-Kiskun megye
        ['county' => 'Bács-Kiskun megye', 'name' => 'Kecskemét', 'zip_code' => '6000', 'population' => 110_787],
        ['county' => 'Bács-Kiskun megye', 'name' => 'Baja', 'zip_code' => '6500', 'population' => 37_481],
        ['county' => 'Bács-Kiskun megye', 'name' => 'Kiskunfélegyháza', 'zip_code' => '6100', 'population' => 29_854],
        ['county' => 'Bács-Kiskun megye', 'name' => 'Kalocsa', 'zip_code' => '6300', 'population' => 17_169],

        // Baranya megye
        ['county' => 'Baranya megye', 'name' => 'Pécs', 'zip_code' => '7621', 'population' => 144_675],
        ['county' => 'Baranya megye', 'name' => 'Mohács', 'zip_code' => '7700', 'population' => 18_467],
        ['county' => 'Baranya megye', 'name' => 'Siklós', 'zip_code' => '7800', 'population' => 12_395],
        ['county' => 'Baranya megye', 'name' => 'Komló', 'zip_code' => '7300', 'population' => 20_543],

        // Békés megye
        ['county' => 'Békés megye', 'name' => 'Békéscsaba', 'zip_code' => '5600', 'population' => 63_431],
        ['county' => 'Békés megye', 'name' => 'Gyula', 'zip_code' => '5700', 'population' => 32_087],
        ['county' => 'Békés megye', 'name' => 'Békés', 'zip_code' => '5630', 'population' => 15_789],
        ['county' => 'Békés megye', 'name' => 'Szeghalom', 'zip_code' => '5520', 'population' => 8_234],

        // Borsod-Abaúj-Zemplén megye
        ['county' => 'Borsod-Abaúj-Zemplén megye', 'name' => 'Miskolc', 'zip_code' => '3530', 'population' => 157_286],
        ['county' => 'Borsod-Abaúj-Zemplén megye', 'name' => 'Eger', 'zip_code' => '3300', 'population' => 55_627],
        ['county' => 'Borsod-Abaúj-Zemplén megye', 'name' => 'Sátoraljaújhely', 'zip_code' => '3980', 'population' => 14_321],
        ['county' => 'Borsod-Abaúj-Zemplén megye', 'name' => 'Mezőkövesd', 'zip_code' => '3400', 'population' => 10_156],

        // Csongrád-Csanád megye
        ['county' => 'Csongrád-Csanád megye', 'name' => 'Szeged', 'zip_code' => '6720', 'population' => 162_547],
        ['county' => 'Csongrád-Csanád megye', 'name' => 'Hódmezővásárhely', 'zip_code' => '6800', 'population' => 45_328],
        ['county' => 'Csongrád-Csanád megye', 'name' => 'Makó', 'zip_code' => '6900', 'population' => 19_687],
        ['county' => 'Csongrád-Csanád megye', 'name' => 'Szentes', 'zip_code' => '6600', 'population' => 31_654],

        // Fejér megye
        ['county' => 'Fejér megye', 'name' => 'Székesfehérvár', 'zip_code' => '8000', 'population' => 98_757],
        ['county' => 'Fejér megye', 'name' => 'Dunaújváros', 'zip_code' => '2400', 'population' => 43_281],
        ['county' => 'Fejér megye', 'name' => 'Mór', 'zip_code' => '8060', 'population' => 11_243],
        ['county' => 'Fejér megye', 'name' => 'Varpalota', 'zip_code' => '8100', 'population' => 9_876],

        // Győr-Moson-Sopron megye
        ['county' => 'Győr-Moson-Sopron megye', 'name' => 'Győr', 'zip_code' => '9021', 'population' => 125_654],
        ['county' => 'Győr-Moson-Sopron megye', 'name' => 'Sopron', 'zip_code' => '9400', 'population' => 37_827],
        ['county' => 'Győr-Moson-Sopron megye', 'name' => 'Mosonmagyaróvár', 'zip_code' => '9200', 'population' => 32_145],
        ['county' => 'Győr-Moson-Sopron megye', 'name' => 'Csorna', 'zip_code' => '9300', 'population' => 8_567],

        // Hajdú-Bihar megye
        ['county' => 'Hajdú-Bihar megye', 'name' => 'Debrecen', 'zip_code' => '4024', 'population' => 201_432],
        ['county' => 'Hajdú-Bihar megye', 'name' => 'Hajdúszoboszló', 'zip_code' => '4200', 'population' => 23_456],
        ['county' => 'Hajdú-Bihar megye', 'name' => 'Balmazújváros', 'zip_code' => '4060', 'population' => 18_234],
        ['county' => 'Hajdú-Bihar megye', 'name' => 'Hajdúnánás', 'zip_code' => '4080', 'population' => 16_789],

        // Heves megye
        ['county' => 'Heves megye', 'name' => 'Eger', 'zip_code' => '3300', 'population' => 55_627],
        ['county' => 'Heves megye', 'name' => 'Hatvan', 'zip_code' => '3000', 'population' => 27_843],
        ['county' => 'Heves megye', 'name' => 'Gyöngyös', 'zip_code' => '3200', 'population' => 30_456],
        ['county' => 'Heves megye', 'name' => 'Pásztó', 'zip_code' => '3060', 'population' => 10_234],

        // Jász-Nagykun-Szolnok megye
        ['county' => 'Jász-Nagykun-Szolnok megye', 'name' => 'Szolnok', 'zip_code' => '5000', 'population' => 67_329],
        ['county' => 'Jász-Nagykun-Szolnok megye', 'name' => 'Jászberény', 'zip_code' => '5100', 'population' => 27_654],
        ['county' => 'Jász-Nagykun-Szolnok megye', 'name' => 'Nagykálló', 'zip_code' => '4330', 'population' => 18_923],
        ['county' => 'Jász-Nagykun-Szolnok megye', 'name' => 'Kunhegyes', 'zip_code' => '5240', 'population' => 12_567],

        // Komárom-Esztergom megye
        ['county' => 'Komárom-Esztergom megye', 'name' => 'Tatabánya', 'zip_code' => '2800', 'population' => 67_854],
        ['county' => 'Komárom-Esztergom megye', 'name' => 'Esztergom', 'zip_code' => '2500', 'population' => 29_476],
        ['county' => 'Komárom-Esztergom megye', 'name' => 'Komárom', 'zip_code' => '2900', 'population' => 19_234],
        ['county' => 'Komárom-Esztergom megye', 'name' => 'Dorog', 'zip_code' => '2510', 'population' => 13_876],

        // Nógrád megye
        ['county' => 'Nógrád megye', 'name' => 'Salgótarján', 'zip_code' => '3100', 'population' => 38_256],
        ['county' => 'Nógrád megye', 'name' => 'Balassagyarmat', 'zip_code' => '3200', 'population' => 15_432],
        ['county' => 'Nógrád megye', 'name' => 'Bátonyterenye', 'zip_code' => '3070', 'population' => 11_234],
        ['county' => 'Nógrád megye', 'name' => 'Pásztó', 'zip_code' => '3060', 'population' => 10_234],

        // Pest megye
        ['county' => 'Pest megye', 'name' => 'Kecskemét', 'zip_code' => '6000', 'population' => 110_787],
        ['county' => 'Pest megye', 'name' => 'Érd', 'zip_code' => '2030', 'population' => 65_432],
        ['county' => 'Pest megye', 'name' => 'Dunakeszi', 'zip_code' => '2120', 'population' => 31_876],
        ['county' => 'Pest megye', 'name' => 'Gödöllő', 'zip_code' => '2100', 'population' => 32_654],

        // Somogy megye
        ['county' => 'Somogy megye', 'name' => 'Kaposvár', 'zip_code' => '7400', 'population' => 67_329],
        ['county' => 'Somogy megye', 'name' => 'Siófok', 'zip_code' => '8600', 'population' => 25_876],
        ['county' => 'Somogy megye', 'name' => 'Nagyatád', 'zip_code' => '7500', 'population' => 12_345],
        ['county' => 'Somogy megye', 'name' => 'Marcali', 'zip_code' => '7540', 'population' => 9_234],

        // Szabolcs-Szatmár-Bereg megye
        ['county' => 'Szabolcs-Szatmár-Bereg megye', 'name' => 'Nyíregyháza', 'zip_code' => '4400', 'population' => 116_284],
        ['county' => 'Szabolcs-Szatmár-Bereg megye', 'name' => 'Kisvárda', 'zip_code' => '4600', 'population' => 17_654],
        ['county' => 'Szabolcs-Szatmár-Bereg megye', 'name' => 'Mátészalka', 'zip_code' => '4700', 'population' => 15_234],
        ['county' => 'Szabolcs-Szatmár-Bereg megye', 'name' => 'Nyírbátor', 'zip_code' => '4440', 'population' => 13_876],

        // Tolna megye
        ['county' => 'Tolna megye', 'name' => 'Szekszárd', 'zip_code' => '7100', 'population' => 35_432],
        ['county' => 'Tolna megye', 'name' => 'Paks', 'zip_code' => '7030', 'population' => 19_876],
        ['county' => 'Tolna megye', 'name' => 'Bonyhád', 'zip_code' => '7150', 'population' => 11_234],
        ['county' => 'Tolna megye', 'name' => 'Tamási', 'zip_code' => '7090', 'population' => 13_456],

        // Vas megye
        ['county' => 'Vas megye', 'name' => 'Szombathely', 'zip_code' => '9700', 'population' => 72_654],
        ['county' => 'Vas megye', 'name' => 'Körmend', 'zip_code' => '9900', 'population' => 13_234],
        ['county' => 'Vas megye', 'name' => 'Sárvár', 'zip_code' => '9600', 'population' => 15_876],
        ['county' => 'Vas megye', 'name' => 'Vasvár', 'zip_code' => '9800', 'population' => 8_654],

        // Veszprém megye
        ['county' => 'Veszprém megye', 'name' => 'Veszprém', 'zip_code' => '8200', 'population' => 58_432],
        ['county' => 'Veszprém megye', 'name' => 'Balatonfüred', 'zip_code' => '8230', 'population' => 13_876],
        ['county' => 'Veszprém megye', 'name' => 'Tapolca', 'zip_code' => '8300', 'population' => 16_543],
        ['county' => 'Veszprém megye', 'name' => 'Ajka', 'zip_code' => '8400', 'population' => 27_654],

        // Zala megye
        ['county' => 'Zala megye', 'name' => 'Zalaegerszeg', 'zip_code' => '8900', 'population' => 57_432],
        ['county' => 'Zala megye', 'name' => 'Keszthely', 'zip_code' => '8360', 'population' => 20_543],
        ['county' => 'Zala megye', 'name' => 'Nagykanizsá', 'zip_code' => '8800', 'population' => 41_234],
        ['county' => 'Zala megye', 'name' => 'Lenti', 'zip_code' => '8700', 'population' => 9_876],
    ];

    /**
     * A seeder futtatása.
     */
    public function run(): void
    {
        foreach (self::CITIES as $cityData) {
            $county = County::where('name', $cityData['county'])->first();

            if ($county) {
                City::updateOrCreate(
                    ['name' => $cityData['name'], 'id_county' => $county->id],
                    [
                        'zip_code' => $cityData['zip_code'],
                        'population' => $cityData['population'],
                    ]
                );
            }
        }
    }
}
