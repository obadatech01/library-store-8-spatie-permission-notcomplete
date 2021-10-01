@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-md-3 col-xs-12">
        <div class="box-content bordered primary margin-bottom-20">
          <div class="profile-avatar">
            <img src="{{(!empty($user->image)) ? url('profiles_image/'.$user->image) : url('profiles_image/default/av01.jfif')}}" alt="" />
            <a href="#" class="btn btn-block btn-inbox"><i class="fa fa-envelope"></i> Send Messages</a>
            <h3><strong>{{$user->name}}</strong></h3>
          </div>
          <!-- .profile-avatar -->
          <table class="table table-hover no-margin">
            <tbody>
              <tr>
                <td>الحالة</td>
                <td><span class="label bg-{{($user->status == 1) ? 'success' : 'danger'}} text-white">{{($user->status == 1) ? 'مفعل' : 'غير مفعل'}}</span></td>
              </tr>
              <tr>
                <td>الصلاحيات</td>
                <td><span class="label bg-danger">{{$user->roles_name}}</span></td>
              </tr>
              <tr>
                <td>عضو منذ</td>
                <td><span class="label bg-primary">{{$user->created_at}}</span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-content bordered -->
      </div>
      <!-- /.col-md-3 col-xs-12 -->
      <div class="col-md-9 col-xs-12">
        <div class="row">
          <div class="col-xs-12">
            <div class="box-content card">
              <h4 class="box-title"><i class="fa fa-user ico"></i>بيانات المستخدم</h4>
              <!-- /.box-title -->
              <div class="card-content">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-xs-5"><label>الاسم:</label></div>
                      <!-- /.col-xs-5 -->
                      <div class="col-xs-7">{{$user->name}}</div>
                      <!-- /.col-xs-7 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-xs-5"><label>البريد الإلكتروني:</label></div>
                      <!-- /.col-xs-5 -->
                      <div class="col-xs-7">{{$user->email}}</div>
                      <!-- /.col-xs-7 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-xs-5"><label>رقم الجوال:</label></div>
                      <!-- /.col-xs-5 -->
                      <div class="col-xs-7">{{$user->mobile}}</div>
                      <!-- /.col-xs-7 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-xs-5"><label>حالة المستخدم:</label></div>
                      <!-- /.col-xs-5 -->
                      <div class="col-xs-7"><span class="label bg-{{($user->status == 1) ? 'success' : 'danger'}} text-white">{{($user->status == 1) ? 'مفعل' : 'غير مفعل'}}</span></div>
                      <!-- /.col-xs-7 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-xs-5"><label>الصلاحيات:</label></div>
                      <!-- /.col-xs-5 -->
                      <div class="col-xs-7"><span class="label bg-danger">{{$user->roles_name}}</span></div>
                      <!-- /.col-xs-7 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-content -->
            </div>
            <!-- /.box-content card -->
          </div>
          <!-- /.col-md-12 -->
        </div>
        <div class="col-md-12 col-xs-12">
          @can('categories')
          <div class="row">
            <div class="box-content card">
              <h4 class="box-title"><i class="fa fa-th"></i> الأقسام <span class="badge bg-info">{{count($categories)}}</span></h4>
              <!-- /.box-title -->
              <div class="card-content">
                <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>الوصف</th>
                      <th>عدد الكتب</th>
                      @can('categories-show')
                      <th>العمليات</th>
                      @endcan
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>الوصف</th>
                      <th>عدد الكتب</th>
                      @can('categories-show')
                      <th>العمليات</th>
                      @endcan
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach ($categories as $category)
                    <?php
                      $i++;
                      $isCountBooks = DB::table('books')->where('category_id', $category->id)->get(); ?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$category->name}}</td>
                      <td>
                        <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#categoriesDesc{{$category->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الوصف</strong></button>
                      </td>
                      <td><span class="badge bg-info">{{$isCountBooks->count()}}</span></td>
                      @can('categories-show')
                      <td>
                        @can('categories-show')
                        <a href="{{route('categories.show', $category->id)}}" class="text-white btn btn-circle btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                        @endcan

                        @can('categories-edit')
                        <a href="{{route('categories.edit', $category->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
                        @endcan

                        @can('categories-delete')
                        @if ($isCountBooks->count() == 0)
                        <a href="{{route('categories.delete', $category->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        @endif
                        @endcan
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-content -->
            </div>
            <!-- /.box-content card -->
          </div>
          <!-- /.row -->
          @endcan

          @can('archives-categories')
          <div class="row">
            <div class="box-content card">
              <h4 class="box-title"><i class="fa fa-th"></i> الأقسام المؤرشفة <span class="badge bg-info">{{count($categoriesArchive)}}</span></h4>
              <!-- /.box-title -->
              <div class="card-content">
                <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>الوصف</th>
                      <th>عدد الكتب</th>
                      @can('archives-categories-restore')
                      <th>العمليات</th>
                      @endcan
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>الوصف</th>
                      <th>عدد الكتب</th>
                      @can('archives-categories-restore')
                      <th>العمليات</th>
                      @endcan
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach ($categoriesArchive as $category)
                    <?php
                      $i++;
                      $isCountBooks = DB::table('books')->where('category_id', $category->id)->get(); ?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$category->name}}</td>
                      <td>
                        <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#categoriesArchiveDesc{{$category->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الوصف</strong></button>
                      </td>
                      <td><span class="badge bg-info">{{$isCountBooks->count()}}</span></td>
                      @can('archives-categories-restore')
                      <td>
                        @can('archives-categories-restore')
                        <a href="{{route('archive.categories.restore',$category->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="ico mdi mdi-backup-restore"></i></a>
                        @endcan

                        @can('categories-force-delete')
                        <a href="{{route('archive.categories.force.delete',$category->id)}}" id="delete" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        @endcan
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-content -->
            </div>
            <!-- /.box-content card -->
          </div>
          <!-- /.row -->
          @endcan

          @can('books')
          <div class="row">
            <div class="box-content card">
              <h4 class="box-title"><i class="fa fa-book"></i> الكتب <span class="badge bg-info">{{count($books)}}</span></h4>
              <!-- /.box-title -->
              <div class="card-content">
                <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>الكود</th>
                        <th>الكتاب</th>
                        <th>وصف الكتاب</th>
                        @can('categories-show')
                        <th>القسم</th>
                        @endcan
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
                        <th>الكتاب</th>
                        <th>وصف الكتاب</th>
                        @can('categories-show')
                        <th>القسم</th>
                        @endcan
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
                        <td>
                          <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#booksDesc{{$book->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الوصف</strong></button>
                        </td>
                        @can('categories-show')
                        <td>
                          <a href="{{route('categories.show',$book['category']->id)}}" class="btn btn-xs btn-icon btn-icon-left btn-warning waves-effect waves-light"><i class="ico ico-left fa fa-eye"></i>{{$book['category']->name}}</a>
                        </td>
                        @endcan
                        <td>
                          <span class="label bg-{{($book->status == 1) ? 'success' : 'danger'}} text-white">{{($book->status == 1) ? 'مفعل' : 'غير مفعل'}}</span>
                        </td>
                        @can('books-edit')
                        <td>
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
              <!-- /.card-content -->
            </div>
            <!-- /.box-content card -->
          </div>
          <!-- /.row -->
          @endcan

          @can('archives-books')
          <div class="row">
            <div class="box-content card">
              <h4 class="box-title"><i class="fa fa-book"></i> الكتب المؤرشفة <span class="badge bg-info">{{count($booksArchive)}}</span></h4>
              <!-- /.box-title -->
              <div class="card-content">
                <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>الكود</th>
                      <th>الكتاب</th>
                      <th>وصف الكتاب</th>
                      @can('categories-show')
                      <th>القسم</th>
                      @endcan
                      <th>حالة الكتاب</th>
                      @can('archives-books-restore')
                      <th>العمليات</th>
                      @endcan
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>الكود</th>
                      <th>الكتاب</th>
                      <th>وصف الكتاب</th>
                      @can('categories-show')
                      <th>القسم</th>
                      @endcan
                      <th>حالة الكتاب</th>
                      @can('archives-books-restore')
                      <th>العمليات</th>
                      @endcan
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach ($booksArchive as $book)
                    <?php $i++; ?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$book->code}}</td>
                      <td>{{$book->name}}</td>
                      <td>
                        <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#booksArchiveDesc{{$book->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الوصف</strong></button>
                      </td>
                      @can('categories-show')
                      <td>
                        <a href="{{route('categories.show',$book['category']->id)}}" class="btn btn-xs btn-icon btn-icon-left btn-warning waves-effect waves-light"><i class="ico ico-left fa fa-eye"></i>{{$book['category']->name}}</a>
                      </td>
                      @endcan
                      <td>
                        <span class="label bg-{{($book->status == 1) ? 'success' : 'danger'}} text-white">{{($book->status == 1) ? 'مفعل' : 'غير مفعل'}}</span>
                      </td>
                      @can('archives-books-restore')
                      <td>
                        @can('archives-books-restore')
                        <a href="{{route('books.edit',$book->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
                        @endcan

                        @can('books-force-delete')
                        <a href="{{route('books.delete',$book->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        @endcan
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-content -->
            </div>
            <!-- /.box-content card -->
          </div>
          <!-- /.row -->
          @endcan
        </div>
        <!-- /.col-md-12 col-xs-12 -->
      </div>
      <!-- /.col-md-9 col-xs-12 -->
    </div>
    <!-- /.row small-spacing -->
    @include('layouts.footer')
  </div>
  <!-- /.main-content -->
</div>
<!--/#wrapper -->

<!-- start categories modal -->
@foreach($categories as $category)
<div class="modal fade" id="categoriesDesc{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addTaskLabel">وصف قسم {{$category->name}}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
              <div class="title">
                <p>{{$category->description}}<p>
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
<!-- end categories modal -->

<!-- start archives categories modal -->
@foreach($categoriesArchive as $category)
<div class="modal fade" id="categoriesArchiveDesc{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addTaskLabel">وصف قسم {{$category->name}}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
              <div class="title">
                <p>{{$category->description}}<p>
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
<!-- end archives categories modal -->

<!-- start books modal -->
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
<!-- end books modal -->

<!-- start archives books modal -->
@foreach($booksArchive as $book)
<div class="modal fade" id="booksArchiveDesc{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel">
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
<!-- end archives books modal -->
@endsection
