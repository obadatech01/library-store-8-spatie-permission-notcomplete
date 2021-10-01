@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">المستخدمين المؤرشَفِين <span class="badge bg-info">{{count($users)}}</span></h4>
					@can('users')
          <a href="{{route('users.index')}}" class="btn btn-info btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-home"></i></a>
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
                  <th>البريد الإلكتروني</th>
                  <th>حالة المستخدم</th>
                  <th>نوع المستخدم</th>
                  <th>الصورة</th>
									@can('archive-users')
                  <th>العمليات</th>
									@endcan
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>الاسم</th>
                  <th>البريد الإلكتروني</th>
                  <th>حالة المستخدم</th>
                  <th>نوع المستخدم</th>
                  <th>الصورة</th>
									@can('archive-users')
                  <th>العمليات</th>
									@endcan
                </tr>
              </tfoot>
              <tbody>
                <?php $i=0; ?>
                @foreach ($users as $user)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <span class="label bg-{{($user->status == 1) ? 'success' : 'danger'}} text-white">{{($user->status == 1) ? 'مفعل' : 'غير مفعل'}}</span>
                  </td>
                  <td><span class="label bg-danger">{{$user->roles_name}}</span></td>
                  <td><img src="{{(!empty($user->image)) ? url('profiles_image/'.$user->image) : url('profiles_image/default/av01.jfif')}}" style="border-radius: 50%;" width="70px" height="70px" /></td>
                  @can('archive-users')
									@endcan
									<td>
										@can('archive-users-restore')
                    <a href="{{route('archive.users.restore',$user->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="ico mdi mdi-backup-restore"></i></a>
										@endcan
                    
										@can('users-force-delete')
										<a href="{{route('archive.users.force.delete',$user->id)}}" id="delete" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
										@endcan
                  </td>
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
