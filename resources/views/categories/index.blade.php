@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">الأقسام <span class="badge bg-info">{{count($categories)}}</span></h4>
          @can('categories-create')
          <a href="{{route('categories.create')}}" class="btn btn-xs btn-success waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i><strong>إضافة قسم</strong></a>
          @endcan

          @can('archives-categories')
          <a href="{{route('archive.categories.index')}}" class="btn btn-xs btn-danger waves-effect waves-light"><i class="ico ico-left fa fa-archive"></i><strong>الأرشيف</strong></a>
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
                  <th>الاسم</th>
                  <th>الوصف</th>
                  <th>عدد الكتب</th>
                  <th>أضيف بواسطة</th>
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
                  <th>أضيف بواسطة</th>
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
                  <td>{{$category['user']->name}}</td>
                  @can('categories-show')
                  <td>
                    @can('categories-show')
                    <a href="{{route('categories.show', $category->id)}}" class="text-white btn btn-circle btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                    @endcan

                    @can('categories-edit')
                    <a href="{{route('categories.edit', $category->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
                    @endcan
                    
                    @can('categories-soft-delete')
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
@endsection
