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
            'password' => 'test_nakajima'
        ];
        $userData = new User;
        $userData->fill($param)->save();

        $param = [
            'name' => 'nakamura',
            'email' => 'nakamura@nakamura.jp',
            'password' => 'test_nakamura'
        ];
        $userData = new User;
        $userData->fill($param)->save();
    }
}
