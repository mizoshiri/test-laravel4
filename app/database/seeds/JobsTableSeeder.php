<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JobsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Job::create([
				'title' => 'Job-'.$index.' - Web Developer Role',
				'body' => 'Body BodyBody BodyBody BodyBody BodyBody BodyBody BodyBody Body',
				'created_at' => '2015-06-07 23:59:59',
				'updated_at' => '2015-06-07 23:59:59',
			]);
		}
	}

}
