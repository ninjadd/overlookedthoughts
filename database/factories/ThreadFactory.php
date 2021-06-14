<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\Topic;
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
        $userIds = User::all()->pluck('id');
        $title = $this->faker->words('2', true);
        $slug = Str::slug($title);
        $topicIds = Topic::all()->pluck('id');

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'topic_id' => $this->faker->randomElement($topicIds),
            'title' => $title,
            'slug' => $slug.'|'.$this->faker->randomElement($topicIds),
            'body' => $this->faker->paragraph(24)
        ];
    }
}
