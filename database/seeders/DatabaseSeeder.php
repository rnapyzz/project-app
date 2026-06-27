<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => '管理者ユーザー',
            'email' => 'admin@example.com',
            // 'role' => '管理者',
        ]);

        $users = User::factory()->count(3)->create();

        Project::factory()
            ->count(2)
            ->create()
            ->each(function ($project) use ($users) {
                Task::factory()
                    ->count(5)
                    ->create([
                        'project_id' => $project->id,
                        'user_id' => $users->random()->id,
                    ]);
            });
    }
}
