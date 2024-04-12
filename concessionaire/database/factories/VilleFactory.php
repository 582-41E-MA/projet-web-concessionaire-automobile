<?php

namespace Database\Factories;
use App\Models\Ville;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ville>
 */
class VilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
        'ville_en' => $this->faker->unique()->city,
        'ville_fr' => "city",
        // 'ville_province_id' => Province::inRandomOrder()->limit(10)->first()->id,  
        'ville_province_id' => Province::factory()
        ];
    }
}
