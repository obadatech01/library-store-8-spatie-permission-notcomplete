@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">الأقسام المؤرشفة <span class="badge bg-info">{{count($categories)}}</span></h4>
          @can('categories')
          <a href="{{route('categories.index')}}" class="btn btn-info btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-home"></i></a>
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
                  <th>أضيف بواسطة</th>
                  @can('archives-categories-restore')
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
                    <td>
                      <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#cateogriesDesc{{$category->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الوصف</strong></button>
                    </td>
                  </td>
                  <td><span class="badge">{{$isCountBooks->count()}}</span></td>
                  <td>{{$category['user']->name}}</td>
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
