<?php

namespace Database\Factories;

use App\Models\Comic;
use App\Models\Enumerations\ComicAgeRating;
use App\Models\Enumerations\ComicType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(array_map(fn ($type) => $type->value, ComicType::cases())),
            'slug' => $this->faker->slug(),
            'writers' => [$this->faker->name()],
            'artists' => [$this->faker->name()],
            'language' => 'en',
            'age_rating' => $this->faker->randomElement(array_map(fn ($type) => $type->value, ComicAgeRating::cases())),
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
