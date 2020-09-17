<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        "name_en"        =>$this->faker->word ."_EN",
        "name_ar"        =>$this->faker->word ."_AR",
        "story_en"        =>$this->faker->word ."_EN",
        "story_ar"        =>$this->faker->word ."_AR",
        "description_en" =>$this->faker->paragraph(1) ."_EN" ,
        "description_ar" =>$this->faker->paragraph(1) ."_AR"
      ];
    }
}
