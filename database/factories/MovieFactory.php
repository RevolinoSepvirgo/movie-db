<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Strings;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $title = fake()->sentence(rand(3, 6));
        $slug = String::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'synopsis' => fake()->paragraph(rand(5, 10)),
            'category_id' =>Category::inRandomOrder()->first(),
            'year' => fake()->year(),
            'actors' => fake()->name() . ', ' . fake('id')->name(),
            'cover_image' => 'https://picsum.photos/seed/' . String::random(10) . '/480/640',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
