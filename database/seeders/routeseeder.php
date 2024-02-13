<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\city;

class routeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use the City model to retrieve city IDs
        $cityIds = city::pluck('id')->toArray();

        // Generate all possible combinations of cities
        $combinations = $this->generateCombinations(count($cityIds));

        // Insert routes for each combination
        foreach ($combinations as $combination) {
            $startCityId = $cityIds[$combination[0] - 1];
            $endCityId = $cityIds[$combination[1] - 1];

            // Skip routes with the same start and end city
            if ($startCityId !== $endCityId) {
                DB::table('routes')->insert([
                    'startcity_id' => $startCityId,
                    'endcity_id' => $endCityId,
                    'distance' => rand(100, 500), 
                    'duration' => $this->generateRandomTime(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Generate all possible combinations of city indices.
     *
     * @param int $count
     * @return array
     */
    private function generateCombinations(int $count): array
    {
        $combinations = [];

        for ($i = 1; $i <= $count; $i++) {
            for ($j = 1; $j <= $count; $j++) {
                $combinations[] = [$i, $j];
            }
        }

        return $combinations;
    }

    /**
     * Generate a random time in the format HH:MM:SS.
     *
     * @return string
     */
    private function generateRandomTime(): string
    {
        return now()->addMinutes(rand(60, 720))->format('H:i:s');
    }
}
