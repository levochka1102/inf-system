<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Citizen;
use App\Models\Conviction;
use App\Models\Passport;
use App\Models\Slug;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Citizen::factory(50)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['passport_id' => Passport::factory()->create()->id],
            ))
            ->create();

        Conviction::factory(100)->create();

        User::create([
            'name' => 'User',
            'email' => 'user@user.ru',
            'password' => '$2y$10$X9LdNq7B7H3LkhYcRH/Z4.NJT.ugbQP4U9jghQCJ741oUFsrjKvS6',
        ]);

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@editor.ru',
            'password' => '$2y$10$X9LdNq7B7H3LkhYcRH/Z4.NJT.ugbQP4U9jghQCJ741oUFsrjKvS6',
        ]);

        Slug::create([
            'name' => 'Редактор'
        ]);

        $editor->slugs()->attach(1);
    }
}
