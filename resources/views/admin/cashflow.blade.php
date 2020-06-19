@extends('layouts.master')
@section('title', 'Cashflow')
@section('css')
<link href="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.min.css')}}" rel="stylesheet" media="screen">
@stop
@section('main-title', 'Cashflow Easy Private')
@section('description', 'Inflow, Outflow, dan Saldo Akhir')
@section('blank-page', 'Cashflow')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h5 class="over-title margin-bottom-15">Togglable <span class="text-bold">Tabs</span></h5>
    <p>
      Add quick, dynamic tab functionality to transition through panes of content, even via dropdown menus.
    </p>
    <div class="tabbable">
      <ul id="myTab1" class="nav nav-tabs">
        <li class="active">
          <a href="#myTab1_example1" data-toggle="tab">
            Tab 1
          </a>
        </li>
        <li>
          <a href="#myTab1_example2" data-toggle="tab">
            Tab 2
          </a>
        </li>
        <li>
          <a href="#myTab1_example3" data-toggle="tab">
            Tab 3
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade in active" id="myTab1_example1">
          <p>
            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
          </p>
          <p>
            Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
          </p>
        </div>
        <div class="tab-pane fade" id="myTab1_example2">
          <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo.
          </p>
          <p>
            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
          </p>
        </div>
        <div class="tab-pane fade" id="myTab1_example3">
          <p>
            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
          </p>
          <p>
            Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
          </p>
        </div>
      </div>
    </div>
    <p>
      <a href="#myTab1_example2" class="btn btn-primary btn-o show-tab">
        Go to tab 2
      </a>
      <a href="#myTab1_example3" class="btn btn-primary btn-o show-tab">
        Go to tab 3
      </a>
    </p>
  </div>
</div>

@stop

@section('javascript')
<script src="{{asset('vendor/maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('vendor/autosize/autosize.min.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/selectFx/classie.js')}}"></script>
<script src="{{asset('vendor/selectFx/selectFx.js')}}"></script>
<!-- <script src="{{asset('assets/js/form-elements.js')}}"></script> -->
<script src="{{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.js')}}"></script>
<!-- form validation -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('assets/js/form-validation.js')}}"></script>
<script>
  jQuery(document).ready(function() {
    // Main.init();
    // FormValidator.init();
  });
</script>
@stop