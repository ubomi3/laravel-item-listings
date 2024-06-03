<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
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
        //\App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'john doe',
            'email' => 'john@gmail.com'
]);

        Listing::factory(6)->create([
            'user_id' => $user->id

        ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Dev',
        //     'tags' => 'laravel, Javascript',
        //     'company' => 'Acme',
        //     'location' => 'Boston',
        //     'email' => 'email@email.com',
        //     'website' => 'www.ace.com',
        //     'description' => 'To roll back the latest migration operation, you may use the rollback Artisan command. This command rolls back the last "batch" of migrations, which may include multiple migration files',

        // ]);

        // Listing::create([
        //     'title' => 'Laravel jnr Dev',
        //     'tags' => 'laravel, Javascript',
        //     'company' => 'Aehy',
        //     'location' => 'nyork',
        //     'email' => 'emailjnr@email.com',
        //     'website' => 'www.aehy.com',
        //     'description' => 'To roll back the latest migration operation, you may use the rollback Artisan command. This command rolls back the last "batch" of migrations, which may include multiple migration files',

        // ]);
    }
}
