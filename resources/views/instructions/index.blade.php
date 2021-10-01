@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">الإرشادات <span class="badge bg-info">{{count($instructions)}}</span></h4>
					@can('instructions-create')
          <a href="{{route('instructions.create')}}" class="btn btn-xs btn-success waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i><strong>إضافة إرشادات</strong></a>
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
                  <th>العنوان</th>
                  <th>الوصف</th>
                  <th>أضيف بواسطة</th>
									@can('instructions-delete')
                  <th>العمليات</th>
									@endcan
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>العنوان</th>
                  <th>الوصف</th>
                  <th>أضيف بواسطة</th>
									@can('instructions-delete')
                  <th>العمليات</th>
									@endcan
                </tr>
              </tfoot>
              <tbody>
                <?php $i=0; ?>
                @foreach ($instructions as $instruction)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$instruction->title}}</td>
                  <td>{{$instruction->body}}</td>
                  <td>{{$instruction['user']->name}}</td>
									@can('instructions-delete')
                  <td>
										@can('instructions-edit')
                    <a href="{{route('instructions.edit', $instruction->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
										@endcan

										@can('instructions-delete')
										<a href="{{route('instructions.delete', $instruction->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
@endsection
