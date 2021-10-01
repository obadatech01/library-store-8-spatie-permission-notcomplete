@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">صلاحيات المستخدم <span class="badge bg-info">{{count($roles)}}</span></h4>
          @can('roles-create')
					<a href="{{route('roles.create')}}" class="btn btn-xs btn-success waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i><strong>إضافة صلاحيات</strong></a>
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
									@can('roles-show')
                  <th>العمليات</th>
									@endcan
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>الاسم</th>
									@can('roles-show')
                  <th>العمليات</th>
									@endcan
                </tr>
              </tfoot>
              <tbody>
                <?php $i=0; ?>
                @foreach ($roles as $role)
                <?php 
                  $i++; 
                  $isCountUserRoles = DB::table('users')->where('roles_name', $role->name)->get();
                ?>
                <tr>
                  <td>{{$i}}</td>
                  <td><span class="label bg-danger">{{$role->name}}</span></td>
									@can('roles-show')
                  <td>
										@can('roles-show')
                    <a href="{{route('roles.show', $role->id)}}" class="text-white btn btn-circle btn-xs btn-warning"><i class="fa fa-eye"></i></a>
										@endcan
										
										@can('roles-edit')
                    <a href="{{route('roles.edit', $role->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
										@endcan
										
										@can('roles-delete')
                    @if($isCountUserRoles->count() == 0)
                    <a href="{{route('roles.delete', $role->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
@endsection
