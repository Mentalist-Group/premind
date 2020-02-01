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
        $restdata = new User;
        $restdata->fill($param)->save();

        $param = [
            'name' => 'nakamura',
            'email' => 'nakamura@nakamura.jp',
            'password' => 'test_nakamura'
        ];
        $restdata = new User;
        $restdata->fill($param)->save();
    }
}
