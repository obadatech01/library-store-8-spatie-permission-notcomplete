@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">تعديل بيانات المستخدم</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <form action="{{route('users.update',$editData->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">الاسم<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{$editData->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="اسم المستخدم" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">البريد الإلكتروني<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="{{$editData->email}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="البريد الإلكتروني">
                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-sm-3 control-label">رقم الجوال</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control" id="mobile" placeholder="رقم الجوال">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roles_name" class="col-sm-3 control-label">الصلاحيات</label>
                                <div class="col-sm-9">
                                    <select name="roles_name" id="roles_name" class="form-control">
                                        <option value="" selected disabled>اختر صلاحية هذا المستخدم...</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}" {{($role->name == $editData->roles_name) ? ' selected' : ''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-3 control-label">الصلاحيات</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected disabled>اختر حالة المستخدم...</option>
                                        <option value="1" {{($editData->status == 1) ? ' selected' : ''}}>مفعل</option>
                                        <option value="0" {{($editData->status == 0) ? ' selected' : ''}}>غير مفعل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">الصورة</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="showImage" class="col-sm-3 control-label">عرض الصورة</label>
                                <div class="col-sm-9">
                                    <img id="showImage" src="{{(!empty($editData->image)) ? url('profiles_image/'.$editData->image) : url('profiles_image/default/av01.jfif')}}" style="width:100px;height:100px;border:1px solid #000;" />
                                </div>
                            </div>
                            <div class="form-group margin-bottom-0">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success btn-sm waves-effect waves-light">تحديث</button>
                                    <a href="{{route('users.index')}}" class="btn btn-info btn-sm waves-effect waves-light">رجوع</a>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
