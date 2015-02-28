<?php
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $faker = Faker::create();
        $questions = Question::all();
        foreach ($questions as $question) {
            $correct = rand(1, 4);
            foreach (range(1, 4) as $index) {
                Answer::create(array(
                    'question_id' => $question->id,
                    'title' => $faker->sentence(),
                    'correct' => $correct == $index
                ));
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}