<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instruction::create([
            'title' => 'القاعدة الأولى',
            'body' => 'المحافظة على الكتاب، وأي ضرر يُلحق بالكتاب لأي سبب كان؛ تتحمل المسؤولية الكاملة',
            'user_id' => 1,
        ]);

        Instruction::create([
            'title' => 'القاعدة الثانية',
            'body' => 'عدم إعطاء أي كتاب لأي شخص غير بأخذ الإذن من أعضاء مجلس العائلة المتفق عليه',
            'user_id' => 1,
        ]);
    }
}
