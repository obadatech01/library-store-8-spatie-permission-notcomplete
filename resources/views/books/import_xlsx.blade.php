@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">إضافة الكتب بواسطة ملف إكسل</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('import.books.excel')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="file" class="col-sm-3 control-label">استيراد ملف إكسل<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="file" name="file" class="form-control" id="file" required />
                </div>
              </div>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">إضافة</button>
                  <a href="{{route('books.index')}}" class="btn btn-info btn-sm waves-effect waves-light">رجوع</a>
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
