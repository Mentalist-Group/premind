<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'nakajima',
            'email' => 'nakajima@nakajima.jp',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
        $userData = new User;
        $userData->fill($param)->save();

        $param = [
            'name' => 'nakamura',
            'email' => 'nakamura@nakamura.jp',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
        $userData = new User;
        $userData->fill($param)->save();
    }
}
