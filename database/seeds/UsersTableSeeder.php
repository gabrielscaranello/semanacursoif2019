<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'email' => 'gabriel@ifpreventos.com.br' ,
            'password' => Hash::make('42274352') ,
            'name' => 'Gabriel Scaranello' ,
            'role' => 'admin',
            'avatar' => '/uploads/avatar/no-image.png',
        ]);

        User::create([
            'email' => 'emanuel@ifpreventos.com.br' ,
            'password' => Hash::make('123987654') ,
            'name' => 'Emanuel Schulz' ,
            'role' => 'admin',
            'avatar' => '/uploads/avatar/no-image.png',
        ]);
    }
}
