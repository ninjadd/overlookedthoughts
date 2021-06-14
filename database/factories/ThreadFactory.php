<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\Topic;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words('2', true);
        $slug = Str::slug($title);
        $topic = Topic::inRandomOrder()->first();

        return [
            'user_id' => $topic->user_id,
            'forum_id' => $topic->forum_id,
            'topic_id' => $topic->id,
            'title' => $title,
            'slug' => $slug.'-'.random_int(100000, 999999),
            'body' => $this->faker->paragraph(24)
        ];
    }
}
