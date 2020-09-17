<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
<<<<<<< HEAD
          "name_en" =>$this->faker->name ."En",
          "name_ar" =>$this->faker->name ."AR",
          "logo" => "img/01.jpg"
=======
            'name_en' => $this->faker->name,
            'name_ar' => $this->faker->name,
            'logo' => $this->faker->imageUrl(),
>>>>>>> 4b8e9f99dd0eae9929cf3cc42e7a0bc363701d28
        ];
    }
}
