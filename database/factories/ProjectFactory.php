<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
          "name_en"        =>$this->faker->word,
          "name_ar"        =>'اسم المشروع بالعربي',
          "description_en" =>$this->faker->paragraph(1),
          "description_ar" =>'محتوى المشروع بالعربي'
          // 'video' => asset('storage/projects/September2020/BKnauKnkA7H8XLSoKlZY.mp4')
       ];
    }
}
