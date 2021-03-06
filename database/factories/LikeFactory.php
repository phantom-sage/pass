<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
              return User::inRandomOrder()->first()->id;
          },
          'project_id' => function () {
            return Project::inRandomOrder()->first()->id;
        },

            "counter" =>$this->faker->numberBetween(1,19)
        ];
    }
}
