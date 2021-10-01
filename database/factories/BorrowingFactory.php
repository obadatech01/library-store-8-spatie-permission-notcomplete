<?php

namespace Database\Factories;

use App\Models\User;
// use Carbon\Traits\Date;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Borrowing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->first()->id,
            'book_id' => rand(1, 7),
            'name' => 'محمد',
            'address' => 'بني سهيلا - مسجد حمزة',
            'email' => 'muhammed01@gmail.com',
            'mobile' => '65655965',
            'date_start' => date('Y-m-d'),
            'borrowing_period' => '15 يوم',
        ];
    }
}
