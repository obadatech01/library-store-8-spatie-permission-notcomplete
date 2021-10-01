@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">تعديل الكتاب</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('books.update',$books->id)}}" method="post" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label for="code" class="col-sm-3 control-label">الكود<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="code" value="{{$books->code}}" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="الكود" autofocus />
                  @error('code')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">الاسم<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$books->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="الكتاب" />
                  @error('name')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="author" class="col-sm-3 control-label">المؤلف</label>
                <div class="col-sm-9">
                  <input type="text" name="author" value="{{$books->author}}" class="form-control" id="author" placeholder="المؤلف" />
                </div>
              </div>
              <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">القسم<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="" selected disabled>اختر القسم...</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{($category->id == $books->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="publish_date" class="col-sm-3 control-label">تاريخ النشر</label>
                <div class="col-sm-9">
                  <input type="date" name="publish_date" value="{{$books->publish_date}}" class="form-control" id="publish_date" placeholder="Y-m-d" />
                </div>
              </div>
              <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">تاريخ إرفاق الكتاب</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="created_at" value="{{$books->created_at}}" id="created_at" placeholder="تاريخ إرفاق الكتاب" />
                </div>
              </div>
              <div class="form-group">
                <label for="book_edition" class="col-sm-3 control-label">الطبعة</label>
                <div class="col-sm-9">
                  <input type="text" name="book_edition" value="{{$books->book_edition}}" class="form-control" id="book_edition" placeholder="الطبعة" />
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-3 control-label">الحالة</label>
                <div class="col-sm-9">
                  <select name="status" id="status" class="form-control">
                    <option value="" selected disabled>اختر الحالة...</option>
                    <option value="1" {{($books->status == 1) ? 'selected' : ''}}>مفعل</option>
                    <option value="0" {{($books->status == 0) ? 'selected' : ''}}>غير مفعل</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-sm-3 control-label">الوصف</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="description" id="description" placeholder="وصف الكتاب">{{$books->description}}</textarea>
                </div>
              </div>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">تحديث</button>
                  <a href="{{route('books.index')}}" class="btn btn-danger btn-sm waves-effect waves-light">رجوع</a>
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
