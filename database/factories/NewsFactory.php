<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        "name_en"        =>$this->faker->word,
        "name_ar"        =>'عنوان الخبر بالعربي' ,
        "description_en" =>$this->faker->paragraph(1),
        "description_ar" =>'محتوى الخبر بالعربي',
          'video' => 'C:\Users\phantomsage\Downloads\Video\The amazing world of Gumball\S05\The Amazing World of Gumball S05E01.mp4'
      ];
    }
}
