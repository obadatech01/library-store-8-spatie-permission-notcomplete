@extends('layouts.master')
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title float-right">جميع المستعيرين <span class="badge bg-info">{{count($borrowings)}}</span></h4>
          <a href="{{route('borrowings.create')}}" class="btn btn-xs text-white btn-success waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i><strong>إضافة مستعير</strong></a>


        </div>
      </div>
      <div class="col-xs-12">
        <div class="box-content">
          <div class="table-responsive" data-pattern="priority-columns">
            <table id="tech-companies-1" class="table table-striped table-bordered text-center display" style="width: 100%;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الكتاب</th>
                  <th>اسم المستعير</th>
                  <th>العنوان</th>
                  <th>الإيميل</th>
                  <th>رقم الجوال</th>
                  <th>ملاحظات</th>
                  <th>تاريخ طلب الاستعارة</th>
                  <th>تاريخ بدء الاستعارة</th>
                  <th>مدة الاستعارة</th>
                  <th>اسم المستعار منه</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>اسم الكتاب</th>
                    <th>اسم المستعير</th>
                    <th>العنوان</th>
                    <th>الإيميل</th>
                    <th>رقم الجوال</th>
                    <th>ملاحظات</th>
                    <th>تاريخ طلب الاستعارة</th>
                    <th>تاريخ بدء الاستعارة</th>
                    <th>مدة الاستعارة</th>
                    <th>اسم المستعار منه</th>
                    <th>العمليات</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php $i=0; ?>
                @foreach ($borrowings as $borrowing)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$borrowing['book']->name}}</td>
                  <td>{{$borrowing->name}}</td>
                  <td>{{$borrowing->address}}</td>
                  <td>{{$borrowing->email}}</td>
                  <td>{{$borrowing->mobile}}</td>
                  <td>
                    <button type="button" class="btn btn-xs btn-icon btn-icon-left btn-info waves-effect waves-light" data-toggle="modal" data-target="#borrowingsNote{{$borrowing->id}}"><strong><i class="ico ico-left fa fa-eye"></i>عرض الملاحظات</strong></button>
                  </td>
                  <td>{{$borrowing->created_at}}</td>
                  <td>{{$borrowing->date_start}}</td>
                  <td>{{$borrowing->borrowing_period}}</td>
                  <td>{{$borrowing['user']->name}}</td>
                  <td>
                    <a href="{{route('borrowings.edit',$borrowing->id)}}" class="text-white btn btn-circle btn-xs btn-info"><i class="fa fa-edit"></i></a>

                    <a href="{{route('borrowings.delete',$borrowing->id)}}" class="text-white btn btn-circle btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

@foreach($borrowings as $borrowing)
<div class="modal fade" id="borrowingsNote{{$borrowing->id}}" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addTaskLabel">الملاحظات</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
                            <div class="title">
                                @if ($borrowing->note != NULL)
                                    <p>{{$borrowing->note}}<p>
                                @else
                                    <p>لا يوجد ملاحظات لعرضها<p>
                                @endif
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
