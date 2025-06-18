<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Student 4',
                'email' => 'test4@email.com',
                'phone' => '+91-987****56',
                'class' => '12th',
                'section' => 'B'
            ],

            [
                'name' => 'Student 1',
                'email' => 'test1@email.com',
                'phone' => '+91-9871111156',
                'class' => '12th',
                'section' => 'B',
            ],
            [
                'name' => 'Student 2',
                'email' => 'test2@email.com',
                'phone' => '+91-9872222256',
                'class' => '11th',
                'section' => 'A',
            ],
            [
                'name' => 'Student 3',
                'email' => 'test3@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 5',
                'email' => 'test5@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 6',
                'email' => 'test6@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 7',
                'email' => 'test7@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 8',
                'email' => 'test8@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 9',
                'email' => 'test9@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 10',
                'email' => 'test10@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 11',
                'email' => 'test11@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 12',
                'email' => 'test12@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 3',
                'email' => 'test13@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 3',
                'email' => 'test23@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 3',
                'email' => 'testc3@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 13',
                'email' => 'testjh13@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 14',
                'email' => 'test14@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 15',
                'email' => 'test15@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 16',
                'email' => 'test3f@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 17',
                'email' => 'test3s@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 18',
                'email' => 'test3cf@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 19',
                'email' => 'test3c@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 20',
                'email' => 'test3o@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
            [
                'name' => 'Student 21',
                'email' => 'test3us@email.com',
                'phone' => '+91-9873333356',
                'class' => '10th',
                'section' => 'C',
            ],
        ];

        // Loop to create all students
        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
