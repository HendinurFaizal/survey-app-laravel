<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User([
            'name' => 'Bernald',
            'email' => 'bernald@unchdeep.ac.id',
            'password' => Hash::make('12341234'),
        ]);
        $user1->save();
    }
}
