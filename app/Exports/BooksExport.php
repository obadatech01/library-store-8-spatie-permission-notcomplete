<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithProperties;

class BooksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function headings(): array
    {
        return [
            '#',
            'رقم القسم',
            'رقم المضيف',
            'الكود',
            'الاسم',
            'المؤلف',
            'الوصف',
            'تاريخ النشر',
            'الطبعة',
            'الحالة',
            '',
            'تاريخ الإضافة',
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }
}
