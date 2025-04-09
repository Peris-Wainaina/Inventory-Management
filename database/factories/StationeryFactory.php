<?php

namespace Database\Factories;

use App\Models\Stationery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stationery>
 */
class StationeryFactory extends Factory
{
    
    protected $model = Stationery::class;
    public function definition(): array
    {
        return [
            'item_name' => $this->faker->word,  // Random word for item nam
        ];
    }
}
