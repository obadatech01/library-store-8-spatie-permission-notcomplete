@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">تحديث الإرشادات</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('instructions.update',$instructions->id)}}" method="post" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">العنوان<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="title" value="{{$instructions->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="العنوان" autofocus />
                  @error('title')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="body" class="col-sm-3 control-label">الإرشادات<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" placeholder="الإرشادات">{{$instructions->body}}</textarea>
                  @error('body')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">تحديث</button>
                  <a href="{{route('instructions.index')}}" class="btn btn-info btn-sm waves-effect waves-light">رجوع</a>
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
