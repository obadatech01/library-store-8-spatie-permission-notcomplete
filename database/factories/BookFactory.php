<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'code' => 'A'.rand(1,999),
            'name' => 'كتاب '.rand(1,10),
            'author' => 'عمر',
            'description' => 'وصف الكتاب '.rand(1,10),
            'publish_date' =>  date("Y-m-d"),
            'book_edition' => 'الطبعة الأولى',
            'status' => 1,
            'user_id' => User::get()->first()->id,
        ];
    }
}
