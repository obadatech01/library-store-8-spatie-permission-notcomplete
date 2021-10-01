@extends('layouts.master')
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">جميع الكتب <span class="badge bg-info">{{count($books)}}</span></h4>
          @can('books-create')
          <a href="{{route('books.create')}}" class="btn btn-xs text-white btn-success waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i><strong>إضافة كتاب</strong></a>
          @endcan

          @can('books-active')
          <a href="{{route('books.active')}}" class="btn btn-xs text-white waves-effect waves-light bg-purple"><i class="ico ico-left fa fa-eye"></i><strong>الكتب المتاحة</strong></a>
          @endcan

          @can('books-inactive')
          <a href="{{route('books.inactive')}}" class="btn btn-xs text-white btn-warning waves-effect waves-light"><i class="ico ico-left fa fa-eye-slash"></i><strong>الكتب المستعارة</strong></a>
          @endcan

          @can('archives-books')
          <a href="{{route('archive.books.index')}}" class="btn btn-xs text-white btn-danger waves-effect waves-light"><i class="ico ico-left fa fa-archive"></i><strong>الأرشيف</strong></a>
          @endcan

          @can('books-import-excel')
          <a href="{{route('import.books.excel.view')}}" class="btn btn-xs text-white btn-info waves-effect waves-light"><i class="ico ico-left fa fa-file-excel-o"></i><strong>استيراد إكسل</strong></a>
          @endcan

          @can('books-export-excel')
          <a href="{{route('export.books.excel')}}" class="btn btn-xs text-white btn-primary waves-effect waves-light"><i class="ico ico-left fa fa-file-excel-o"></i><strong>طباعة إكسل</strong></a>
          @endcan

          @can('books-export-pdf')
          <a href="{{route('export.books.pdf')}}" class="btn btn-xs text-white btn-violet waves-effect waves-light"><i class="ico ico-left fa fa-print"></i><strong>طباعة pdf</strong></a>
          @endcan

        </div>
      </div>
      <div class="col-xs-12">
        <div class="box-content">
          <div class="table-responsive" data-pattern="priority-columns">
            <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width: 100%;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الكود</th>
                  <th>اسم الكتاب</th>
                  <th>اسم المؤلف</th>
                  <th>وصف الكتاب</th>
                  @can('categories-show')
                  <th>اسم القسم</th>
                  @endcan
                  <th>تاريخ النشر</th>
                  <th>تاريخ إرفاق الكتاب</th>
                  <th>رقم الطبعة</th>
                  <th>أضيف بواسطة</th>
                  <th>حالة الكتاب</th>
                  @can('books-edit')
                  <th>العمليات</th>
                  @endcan
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>الكود</th>
                  <th>اسم الكتاب</th>
                  <th>اسم المؤلف</th>
                  <th>وصف الكتاب</th>
                  @can('categories-show')
                  <th>اسم القسم</th>
                  @endcan
                  <th>تاريخ النشر</th>
                  <th>تاريخ إرفاق الكتاب</th>
                  <th>رقم الطبعة</th>
                  <th>أضيف بواسطة</th>
                  <th>حالة الكتاب</th>
                  @can('books-edit')
                  <th>العمليات</th>
                  @endcan
                </tr>
              </tfoot>
              <tbody>
                <?php $i=0; ?>
                @foreach ($books as $book)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$book->code}}</td>
                  <td>{{$book->name}}</td>
                  <td>{{$book->author}}</td>
                  <td>
                    <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#booksDesc{{$book->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الوصف</strong></button>
                  </td>
                  @can('categories-show')
                  <td>
                    <a href="{{route('categories.show',$book['category']->id)}}" class="btn btn-xs btn-icon btn-icon-left btn-warning waves-effect waves-light"><strong><i class="ico ico-left fa fa-eye"></i>{{$book['category']->name}}</strong></a>
                  </td>
                  @endcan
                  <td>{{$book->publish_date}}</td>
                  <td>
                    {{$book->created_at}}
                  </td>
                  <td>{{$book->book_edition}}</td>
                  <td>{{$book['user']->name}}</td>
                  <td>
                    <span class="label bg-{{($book->status == 1) ? 'success' : 'danger'}} text-white">{{($book->status == 1) ? 'مفعل' : 'غير مفعل'}}</span>
                  </td>
                  @can('books-edit')
                  <td>
                    @if($book->status == 1)
                    <a href="{{route('books.addBorrowing',$book->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-book"></i></a>
                    @endif

                    @can('books-edit')
                    <a href="{{route('books.edit',$book->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
                    @endcan

                    @can('books-soft-delete')
                    <a href="{{route('books.delete',$book->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    @endcan
                  </td>
                  @endcan
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-xs-12 -->
    </div>
    <!-- /.row -->

    @include('layouts.footer')
  </div>
  <!-- /.main-content -->
</div>
<!--/#wrapper -->

@foreach($books as $book)
<div class="modal fade" id="booksDesc{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addTaskLabel">وصف كتاب {{$book->name}}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
              <div class="title">
                <p>{{$book->description}}<p>
              </div>
            </div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-xs btn-icon btn-icon-left btn-danger text-center waves-effect waves-light" style="font-size: larger;" data-dismiss="modal"><strong>إغلاق</strong></button>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
