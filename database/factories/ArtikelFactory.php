<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Artikel::class;

    public function definition()
    {
        return [
            'category_id'=>Category::inRandomOrder()->orderBy('id')->first(),
            'name'=>$this->faker->name,
            'watak'=>$this->faker->watak,
            'konten'=>$this->faker->paragraph,
        ];
    }
}
