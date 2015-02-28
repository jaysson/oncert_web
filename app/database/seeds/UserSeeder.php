<?php
use Faker\Factory as Faker;
use Faker\Provider\Image;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new Image($faker));
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $user = User::create(array(
                'name' => $faker->word,
                'email' => $faker->email,
                'password' => 'password',
                'address_1' => $faker->address,
                'city' => $faker->city,
                'country' => $faker->country,
                'zip_code' => $faker->postcode,
            ));
//            var_dump($user->errors());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}