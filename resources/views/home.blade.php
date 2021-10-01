@extends('layouts.master') 
@section('content')
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-success text-white">
          <div class="statistics-box with-icon">
            <i class="ico small fa fa-th"></i>
            <p class="text text-white">الأقسام</p>
            <h2 class="counter">{{count($categories)}}</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-info text-white">
          <div class="statistics-box with-icon">
            <i class="ico small fa fa-book"></i>
            <p class="text text-white">الكتب</p>
            <h2 class="counter">{{count($books)}}</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-danger text-white">
          <div class="statistics-box with-icon">
            <i class="ico small fa fa-eye"></i>
            <p class="text text-white">الكتب المتاحة</p>
            <h2 class="counter">{{count($booksActive)}}</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-warning text-white">
          <div class="statistics-box with-icon">
            <i class="ico small fa fa-eye-slash"></i>
            <p class="text text-white">الكتب المستعارة</p>
            <h2 class="counter">{{count($booksInactive)}}</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
    </div>
    <!-- .row -->

    <div class="box-content">
      <h4 class="box-title">مكتبة منهل الظمآن ومشرب العطشان</h4>
      <!-- /.box-title -->
      أهلًا وسهلا بكم في مكتبتنا
    </div>

    <div class="row small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title">مكتبة منهل الظمآن ومشرب العطشان</h4>
          <!-- /.box-title -->
          <div class="row">
            <div class="col-md-12 margin-bottom-20">
              <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">نبذة تعريفية</a></li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Profile</a></li>
                <li role="presentation" class="dropdown">
                  <a href="#" class="dropdown-toggle" id="myTabDrop1" data-toggle="dropdown" aria-controls="myTabDrop1-contents">الإرشادات <span class="caret"></span></a>
                  <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                    <?php $i=0; ?>
                    @foreach ($instructions as $instruction)
                    <?php $i++; ?>
                    <li><a href="#dropdown{{$i}}" role="tab" id="dropdown{{$i}}-tab" data-toggle="tab" aria-controls="dropdown{{$i}}">{{$instruction->title}}</a></li>
                    @endforeach
                  </ul>
                </li>
              </ul>
              <!-- /.nav-tabs -->
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade in active" role="tabpanel" id="home" aria-labelledby="home-tab">
                  <p>
                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                    keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                  </p>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                  <p>
                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                    Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero
                    magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero
                    sint qui sapiente accusamus tattooed echo park.
                  </p>
                </div>
                <?php $i=0; ?>
                @foreach ($instructions as $instruction)
                <?php $i++; ?>
                <div class="tab-pane fade" role="tabpanel" id="dropdown{{$i}}" aria-labelledby="dropdown{{$i}}-tab">
                  <p>{{$instruction->body}}</p>
                </div>
                @endforeach
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-xs-12 -->
    </div>
    <!-- /.row -->
    @include('layouts.footer')
  </div>
  <!-- /.main-content -->
</div>
<!--/#wrapper -->
@endsection
