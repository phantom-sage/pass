<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\File;
use App\Models\News;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Story;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        define('NUMBER_OF_MODELS_CREATED', 10);


        // User::factory(10)->create();
        Project::factory(constant('NUMBER_OF_MODELS_CREATED'))->create();
        Story::factory(constant('NUMBER_OF_MODELS_CREATED'))->create();
        News::factory(constant('NUMBER_OF_MODELS_CREATED'))->create();
        Partner::factory(constant('NUMBER_OF_MODELS_CREATED'))->create();
        File::factory(constant('NUMBER_OF_MODELS_CREATED'))->create();
    }
}
