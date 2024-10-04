<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karlotbl;

class KarlotblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into the karlotbl table
        Karlotbl::create([
            'name' => 'James karlo Abina',
            'age' => 33,
            'email' => 'karlo@gmail.com',
            'motto' => 'Dream big',
        ]);

        Karlotbl::create([
            'name' => 'Mich Mascariola',
            'age' => 27,
            'email' => 'mich@gmail.com',
            'motto' => 'Work hard, play hard',
        ]);

        Karlotbl::create([
            'name' => 'Paolo Jimenez',
            'age' => 37,
            'email' => 'paolo@gmail.com',
            'motto' => 'Be yourself',
        ]);
    }
}
