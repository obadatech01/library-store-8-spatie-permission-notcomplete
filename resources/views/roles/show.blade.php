@extends('layouts.master') 
@section('content')
<style>
  ul.timeline li {
    position: relative;
    height: 3em;
    color: #888;
  }

  ul.timeline li:before {
    display: inline-block;
    height: 3em;
    width: 1px;
    background: #aaaa;
    margin: 0;
    padding: 0;
    position: absolute;
    left: -11px;
    top: -0.4em;
    z-index: -1;
  }

  ul.timeline:before {
    display: inline-block;
    margin: 0;
    padding: 0;
    position: relative;
    left: -1em;
    top: 0.1em;
    color: #aaa;
  }

  ul.timeline:after {
    display: inline-block;
    margin: 0;
    padding: 0;
    position: relative;
    left: -1em;
    top: -1em;
    color: #aaa;
  }
</style>
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-md-12 col-xs-12">
        <div class="box-content">
          @can('roles')
          <h4 class="box-title">
            <a href="{{route('roles.index')}}" class="btn btn-info btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-home"></i></a>
          </h4>
          @endcan
          <!-- /.box-title -->
          <div id="accordion" class="js__ui_accordion ui-accordion ui-widget ui-helper-reset" role="tablist">
            <h3
              class="accordion-title ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all"
              role="tab"
              id="ui-id-1"
              aria-controls="ui-id-2"
              aria-selected="false"
              aria-expanded="false"
              tabindex="0"
            >
              <span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="label bg-success">{{$role->name}}</span>
            </h3>
            <div class="accordion-content ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" style="display: none;" id="ui-id-2" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="true">
              <ul class="timeline">
                @if (!empty($rolePermissions)) @foreach ($rolePermissions as $v)
                <li><span class="badge bg-danger badge-pill font-weight-normal">{{ $v->name }}</span></li>
                @endforeach @endif
              </ul>
            </div>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-md-12 col-xs-12 -->
    </div>
  </div>
</div>
@endsection
