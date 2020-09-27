<?php

namespace Database\Factories;

use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VolunteerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Volunteer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->name,
            'name_ar' => $this->faker->name,
            'description_en' => $this->faker->company,
            'description_ar' => $this->faker->company,
            'qualification_en' => $this->faker->title,
            'qualification_ar' => $this->faker->title,
            'start_at' => $this->faker->date(),
            'end_at' => $this->faker->date()
        ];
    }
}
