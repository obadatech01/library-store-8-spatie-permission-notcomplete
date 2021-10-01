@extends('layouts.master')

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title float-right">المستخدمين <span class="badge bg-info">{{count($users)}}</span></h4>
                    @can('users-create')
                    <a href="{{route('users.create')}}" class="btn btn-xs btn-success waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i><strong>إضافة مستخدمين</strong></a>
                    @endcan

                    @can('archives-users')
                    <a href="{{route('archive.users.index')}}" class="btn btn-xs btn-danger waves-effect waves-light"><i class="ico ico-left fa fa-archive"></i><strong>الأرشيف</strong></a>
                    @endcan
                </div>
            </div>
            <div class="col-xs-12">
				<div class="box-content">
					<div class="table-responsive" data-pattern="priority-columns">
					    <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width:100%">
    						<thead>
    							<tr>
    								<th>#</th>
    								<th>الاسم</th>
    								<th>البريد الإلكتروني</th>
    								<th>حالة المستخدم</th>
                                    <th>نوع المستخدم</th>
                                    <th>الصورة</th>
                                    @can('users-profiles')
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
                                    @can('users-profiles')
    								<th>العمليات</th>
                                    @endcan
    							</tr>
    						</tfoot>
    						<tbody>
                                <?php $i=0; ?>
                                @foreach ($users as $user)
                                <?php
                                    $i++;
                                    $isCountUserCategories = DB::table('categories')->where('user_id', $user->id)->get();
                                    $isCountUserBooks = DB::table('books')->where('user_id', $user->id)->get();
                                ?>
                                <tr>
    								<td>{{$i}}</td>
    								<td>{{$user->name}}</td>
    								<td>{{$user->email}}</td>
    								<td>
                                        <span class="label bg-{{($user->status == 1) ? 'success' : 'danger'}} text-white">{{($user->status == 1) ? 'مفعل' : 'غير مفعل'}}</span>
                                    </td>
    								<td>
                                        <span class="label bg-danger">{{$user->roles_name}}</span>
                                    </td>
    								<td><img src="{{(!empty($user->image)) ? url('profiles_image/'.$user->image) : url('profiles_image/default/av01.jfif')}}" style="border-radius: 50%" width="70px" height="70px" /></td>
                                    @can('users-profiles')
                                    <td>
                                        @can('users-profiles')
                                        <a href="{{route('users.profile.index', $user->id)}}" class="text-white btn btn-circle btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                                        @endcan

                                        @can('users-edit')
                                        <a href="{{route('users.edit', $user->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('users-soft-delete')
                                        @if (($isCountUserCategories->count() == 0) && ($isCountUserBooks->count() == 0) && ($user->email != 'obadatech02@gmail.com'))
                                        <a href="{{route('users.delete', $user->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
</div><!--/#wrapper -->
@endsection
