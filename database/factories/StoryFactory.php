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
        "name_en"        =>$this->faker->word,
        "name_ar"        =>'اسم القصة بالعربي',
        "story_en"        =>$this->faker->word,
        "story_ar"        =>'القصة بالعربي',
        "description_en" =>$this->faker->paragraph(1),
        "description_ar" =>'وصف القصة بالعربي'
      ];
    }
}
