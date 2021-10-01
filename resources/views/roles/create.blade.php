@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">إضافة صلاحيات جديد</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('roles.store')}}" method="post" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">اسم الصلاحية<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="اسم الصلاحية" autofocus />
                  @error('name')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <ul id="treeview1">
                @foreach ($permission as $value)
                <li>
                  <label style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }} {{ $value->name }}</label>
                </li>
                @endforeach
              </ul>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">إضافة</button>
                  <a href="{{route('roles.index')}}" class="btn btn-info btn-sm waves-effect waves-light">رجوع</a>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-content -->
        </div>
        <!-- /.box-content card white -->
      </div>
      <!-- /.col-lg-6 col-xs-12 -->
    </div>
  </div>
</div>
{!! Form::close() !!} 
@endsection
