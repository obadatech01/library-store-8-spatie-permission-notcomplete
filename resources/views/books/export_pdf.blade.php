<!DOCTYPE html>
<html>
  <head>
    <style>
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td,
      #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      #customers tr:hover {
        background-color: #ddd;
      }

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04aa6d;
        color: white;
      }

      a {
        text-decoration: none;
        color: #000;
      }
    </style>
  </head>

  <body>
    <table id="customers">
      <thead>
        <tr>
          <th>#</th>
          <th>الكود</th>
          <th>اسم الكتاب</th>
          <th>اسم المؤلف</th>
          <th>وصف الكتاب</th>
          <th>اسم القسم</th>
          <th>تاريخ النشر</th>
          <th>تاريخ إرفاق الكتاب</th>
          <th>رقم الطبعة</th>
          <th>أضيف بواسطة</th>
          <th>حالة الكتاب</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($books as $book)
        <?php $i++; ?>
        <tr>
          <td>{{$i}}</td>
          <td>{{$book->code}}</td>
          <td>{{$book->name}}</td>
          <td>{{$book->author}}</td>
          <td>{{$book->description}}</td>
          <td><a href="{{route('categories.show',$book['category']->id)}}">{{$book['category']->name}}</a></td>
          <td>{{$book->publish_date}}</td>
          <td>
            {{$book->created_at}}
          </td>
          <td>{{$book->book_edition}}</td>
          <td>{{$book['user']->name}}</td>
          <td>{{($book->status == 1) ? 'مفعل' : 'غير مفعل'}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <br />
    <br />
    <i style="font-size: 10px;">Print Date: 12 09 2021</i>
  </body>
</html>
