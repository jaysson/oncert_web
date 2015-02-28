<?php
use Faker\Factory as Faker;

class CertificationSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Certification::truncate();
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Certification::create(array(
                'title' => $faker->sentence(),
            ));
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}