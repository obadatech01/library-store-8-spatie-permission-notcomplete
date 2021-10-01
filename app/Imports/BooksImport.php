<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function model(array $row)
   {
       return new Book([
           'category_id'  => $row['categoryid'],
           'user_id' => $row['userid'],
           'code' => $row['code'],
           'name'    => $row['name'],
           'author' => $row['author'],
           'description'    => $row['description'],
           'publish_date' => $row['publishdate'],
           'book_edition'    => $row['bookedition'],
           'status'    => $row['status'],
       ]);

       /*
        return new Book([
           'category_id'  => $row['رقم القسم'],
           'user_id' => $row['رقم المضيف'],
           'code' => $row['الكود'],
           'name'    => $row['الاسم'],
           'author' => $row['المؤلف'],
           'description'    => $row['الوصف'],
           'publish_date' => $row['تاريخ النشر'],
           'book_edition'    => $row['الطبعة'],
           'status'    => $row['الحالة'],
       ]);
       */
   }
}
