@extends('layouts.master')
@section('content')
<style>
input[name="book_id"] {
  border: 2px solid rgb(182, 182, 181);
  border-radius: 10px 10px 10px 10px;
  font-size: 18px;
  padding: 5px;
  height: 35px;
  width: 350px;
}
</style>
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
          <h4 class="box-title">تعديل</h4>
          <!-- /.box-title -->
          <div class="card-content">
            <form action="{{route('borrowings.update',$borrowings->id)}}" method="post" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">اسم المستعير<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$borrowings->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="اسم المستعير" autofocus />
                  @error('name')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">العنوان<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="address" value="{{$borrowings->address}}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="العنوان" autofocus />
                  @error('address')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="mobile" class="col-sm-3 control-label">رقم الجوال<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="mobile" value="{{$borrowings->mobile}}" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="رقم الجوال" />
                  @error('mobile')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">البريد الإلكتروني<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="email" name="email" value="{{$borrowings->email}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="البريد الإلكتروني" />
                  @error('email')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="book_id" class="col-sm-3 control-label">الكتاب<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input list="books" class="@error('book_id') is-invalid @enderror" id="book_id" name="book_id" value="{{$borrowings['book']->name}}" placeholder="اختر الكتاب...">
                    <datalist id="books">
                        @foreach ($books as $book)
                        <option value="{{$book->id}}">{{$book->name}}</option>
                        @endforeach
                    </datalist><br>
                    @error('book_id')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="date_start" class="col-sm-3 control-label">تاريخ الاستعارة<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="date" name="date_start" value="{{$borrowings->date_start}}" class="form-control @error('date_start') is-invalid @enderror" id="date_start" placeholder="Y-m-d" />
                  @error('date_start')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="borrowing_period" class="col-sm-3 control-label">مدة الاستعارة<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="borrowing_period" value="{{$borrowings->borrowing_period}}" class="form-control @error('borrowing_period') is-invalid @enderror" id="borrowing_period" placeholder="15 يوم" />
                  @error('borrowing_period')
                  <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="note" class="col-sm-3 control-label">ملاحظات</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="note" id="note" placeholder="ملاحظات">{{$borrowings->note}}</textarea>
                </div>
              </div>
              <div class="form-group margin-bottom-0">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">تحديث</button>
                  <a href="{{route('borrowings.index')}}" class="btn btn-info btn-sm waves-effect waves-light">رجوع</a>
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
