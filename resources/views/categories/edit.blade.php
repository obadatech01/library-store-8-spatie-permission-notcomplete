@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">تعديل القسم</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('categories.update',$categories->id)}}" method="post" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label for="inp-type-1" class="col-sm-3 control-label">الاسم</label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$categories->name}}" class="form-control @error('name') is-invalid @enderror" id="inp-type-1" placeholder="القسم" autofocus />
                  @error('name')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="inp-type-5" class="col-sm-3 control-label">الوصف</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="description" id="inp-type-5" placeholder="وصف القسم">{{$categories->description}}</textarea>
                </div>
              </div>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">تحديث</button>
                  <a href="{{route('categories.index')}}" class="btn btn-danger btn-sm waves-effect waves-light">رجوع</a>
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
