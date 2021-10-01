@extends('layouts.master2')

@section('content')
<div id="single-wrapper">
	<form action="{{ route('login') }}" method="post" class="frm-single">
        @csrf
		<div class="inside">
			<div class="title"><strong>مكتبة العائلة</strong></div>
			<!-- /.title -->
			<div class="frm-title">تسجيل الدخول</div>
			<!-- /.frm-title -->
			<div class="frm-input">
                <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="البريد الإلكتروني" class="frm-inp @error('email') is-invalid @enderror" autofocus><i class="fa fa-user frm-ico"></i>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
			<!-- /.frm-input -->
			<div class="frm-input">
                <input type="password" id="password" name="password" value="{{old('password')}}" placeholder="كلمة السر" class="frm-inp @error('password') is-invalid @enderror"><i class="fa fa-lock frm-ico"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="pull-left">
					<div class="checkbox primary">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} /><label for="rememberme">تذكرني</label>
                    </div>
					<!-- /.checkbox -->
				</div>
				<!-- /.pull-left -->
				<div class="pull-right"><a href="{{ route('password.request') }}" class="a-link"><i class="fa fa-unlock-alt"></i>هل نسيت كلمة السر؟</a></div>
				<!-- /.pull-right -->
			</div>
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">دخول<i class="fa fa-arrow-circle-right"></i></button>
			<div class="frm-footer">obadatech01 © 2021.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->
@endsection
