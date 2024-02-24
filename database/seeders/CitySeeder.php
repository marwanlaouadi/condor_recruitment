<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;
use App\Models\City; // Import your City model
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Model::unguard();

        $countriesCount = City::count();
        if (!$countriesCount) {
            $this->makeCountry();
        }
    }

    protected function makeCountry()
    {
        $countries_list = json_decode(file_get_contents(base_path('resources/seed-data/cities.json')), true);

        for ($i = 0; $i < count($countries_list); $i++) {
                $country_data[] = [
                    "id" => $countries_list[$i]['id'],
                    'name' => $countries_list[$i]['name'],
                    'long' =>  $countries_list[$i]['longitude'],
                    'lat' =>  $countries_list[$i]['latitude'],
                    'state_id' => $countries_list[$i]['state_id']
                ];
        }

        $country_chunks = array_chunk($country_data, ceil(count($country_data) / 1000));

        foreach ($country_chunks as $country) {
            City::insert($country);
        }
    }
}
