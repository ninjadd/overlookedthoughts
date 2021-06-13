<?php

namespace Database\Factories;

use App\Models\Topic;
use App\Models\Forum;
use App\Models\User;
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
        $userIds = User::all()->pluck('id');
        $title = $this->faker->sentence('2');
        $slug = Str::slug($title);
        $forumIds = Forum::all()->pluck('id');

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'forum_id' => $this->faker->randomElement($forumIds),
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraph(2)
        ];
    }
}
