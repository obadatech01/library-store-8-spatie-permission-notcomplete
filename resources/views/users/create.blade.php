@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">إضافة مستخدم جديد</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <form action="{{route('users.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">الاسم<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="اسم المستخدم" autofocus>
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
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="البريد الإلكتروني">
                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">كلمة السر<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="كلمة السر">
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
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="أعد كتابة كلمة السر">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-sm-3 control-label">رقم الجوال</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="رقم الجوال">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roles_name" class="col-sm-3 control-label">الصلاحيات<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="roles_name" id="roles_name" class="form-control @error('roles_name') is-invalid @enderror">
                                        <option value="" selected disabled>اختر صلاحية هذا المستخدم...</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('roles_name')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">الصورة</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                    @error('image')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="showImage" class="col-sm-3 control-label">عرض الصورة</label>
                                <div class="col-sm-9">
                                    <img id="showImage" src="{{url('profiles_image/default/av01.jfif')}}" style="width:100px;height:100px;border:1px solid #000;" />
                                </div>
                            </div>
                            <div class="form-group margin-bottom-0">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success btn-sm waves-effect waves-light">إضافة</button>
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
