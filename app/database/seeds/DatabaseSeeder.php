<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->call('UserSeeder');
        $this->call('CertificationSeeder');
        $this->call('ExamSeeder');
        $this->call('SessionSeeder');
        $this->call('QuestionSeeder');
        $this->call('AnswerSeeder');
//        $this->call('AttemptSeeder');
	}

}
