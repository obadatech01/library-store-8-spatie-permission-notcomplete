@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">تغيير كلمة السر</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('users.password.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="current_password" class="col-sm-3 control-label">كلمة السر الحالية<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="كلمة السر الحالية" />
                  @error('current_password')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">كلمة السر الجديدة<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="كلمة السر الجديدة" />
                  @error('password')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label">تأكيد كلمة السر<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="أعد كتابة كلمة السر" />
                  @error('password_confirmation')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">تحديث</button>
                  <a href="{{route('users.profile.index',Auth::id())}}" class="btn btn-info btn-sm waves-effect waves-light">رجوع</a>
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
@endsection
