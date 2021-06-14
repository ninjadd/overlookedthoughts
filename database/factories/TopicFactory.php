<?php

namespace Database\Factories;

use App\Models\Topic;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words('2', true);
        $slug = Str::slug($title);
        $forum = Forum::inRandomOrder()->first();

        return [
            'user_id' => $forum->user_id,
            'forum_id' => $forum->id,
            'title' => $title,
            'slug' => $slug.'-'.random_int(100000, 999999),
            'description' => $this->faker->paragraph(7)
        ];
    }
}
