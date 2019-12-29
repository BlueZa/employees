<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('Таблица сотрудиков заполнена данными!');
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('employees')->truncate('restart identity');

        DB::table('employees')->insert([

            [
                'name' => 'Хвостовский Марк Никанорович',
                'dob' => '12.11.1978',
                'position' => 'Ведущий разработчик'
            ],

            [
                'name' => 'Труфанов Назар Иванович',
                'dob' => '05.02.1990',
                'position' => 'Дизайнер'
            ],

            [
                'name' => 'Лебедев Сергей Матвеевич',
                'dob' => '22.09.1989',
                'position' => 'Начинающий разработчик'
            ],

            [
                'name' => 'Морозова Серафима Тарасовна',
                'dob' => '14.07.1993',
                'position' => 'SEO-специалист'
            ],

            [
                'name' => 'Рустамова Алёна Анатольевна',
                'dob' => '03.04.1989',
                'position' => 'PR-менеджер'
            ]

        ]);
    }

}
