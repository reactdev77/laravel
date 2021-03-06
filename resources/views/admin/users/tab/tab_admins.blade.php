@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
Edit User
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<!--end of page level css-->
<style>
   {{-- @todo oto css --}}
   .padding-20 {
   padding: 20px;
   }
   .padding-30 {
   padding: 30px;
   }
   .padding-40 {
   padding: 40px;
   }
   .padding-50 {
   padding: 50px;
   }
   .input_datetime {
   width: 140px;
   }
</style>
@stop
{{-- Page content --}}
@section('content')
<section class="content-header">
   <h1>Edit Admins</h1>
   <ol class="breadcrumb">
      <li>
         <a href="{{ route('admin.dashboard') }}">
         <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
         Dashboard
         </a>
      </li>
      <li>Members</li>
      <li>Edit</li>
      <li class="active">Admins</li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="col-md-12">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title">
                     <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff"
                        data-loop="true"></i>
                     Editing admins :
                     <p class="user_name_max">{!! $user->first_name!!} {!! $user->last_name!!}</p>
                  </h3>
                  <span class="pull-right clickable">
                  <i class="glyphicon glyphicon-chevron-up"></i>
                  </span>
               </div>
               <div class="panel-body">
                  <!--main content-->
                  <div class="row">
                     <div class="tabbable">
                        <ul class="nav nav-tabs" id="">
                           <li><a href="{{ route('admin.members.view.company', $user->id) }}">Company</a></li>
                           <li class="active"><a href="{{ route('admin.members.edit.users', $user->id) }}">Admins</a></li>
                           <li><a href="{{ route('admin.members.edit.billing', $user->id) }}">Billing</a></li>
                           <li><a href="{{ route('admin.members.edit.users', $user->id) }}">Users</a></li>
                           <li><a href="{{ route('admin.members.view.stats', $user->id) }}">Stats</a></li>
                           <li><a href="{{ route('admin.members.view.settings', $user->id) }}">Settings</a></li>
                           <!--
                              <li><a href="#tab_user" data-toggle="tab">deprecated: User Profile</a></li>
                              <li><a href="#tab_bio" data-toggle="tab">deprecated: Bio</a></li>
                              <li><a href="#tab_address" data-toggle="tab">deprecated: Address</a></li>
                              <li><a href="#tab_user_group" data-toggle="tab">deprecated: User Group</a></li>
                              -->
                        </ul>
                        <div class="row padding-30">
                           <div class="tab-content">
                              <section class="content">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="panel panel-primary filterable">
                                          <div class="panel-heading clearfix  ">
                                             <div class="panel-title pull-left">
                                                <div class="caption">
                                                   Users
                                                </div>
                                             </div>
                                          </div>
                                          <div class="panel-body table-responsive">
                                             <table class="table table-striped" id="table5">
                                                <thead>
                                                   <tr class="filters">
                                                      <th title="Click to order">First Name</th>
                                                      <th title="Click to order">Last Name</th>
                                                      <th title="Click to order">Admin acc #</th>
                                                      <th title="Click to order">Level</th>
                                                      <th title="Click to order">Telephone</th>
                                                      <th title="Click to order">Email</th>
                                                      <th title="Click to order">Joined</th>
                                                      <th title="Click to order">Status</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!--delete modal starts here-->
                                 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             <h4 class="modal-title custom_align" id="Heading">
                                                Delete this entry
                                             </h4>
                                          </div>
                                          <div class="modal-body">
                                             <div class="alert alert-warning">
                                                <span class="glyphicon glyphicon-warning-sign"></span>
                                                Are you sure you want to delete this Record?
                                             </div>
                                          </div>
                                          <div class="modal-footer ">
                                             <button type="button" class="btn btn-warning">
                                             <span class="glyphicon glyphicon-ok-sign"></span>
                                             Yes
                                             </button>
                                             <button type="button" class="btn btn-warning" data-dismiss="modal">
                                             <span class="glyphicon glyphicon-remove"></span>
                                             No
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- /.modal ends here -->
                              </section>
                              <div class="tab-pane" id="tab_user">
                                 <h2 class="hidden">&nbsp;</h2>
                                 <form class="form-horizontal" role="form">
                                    <fieldset>
                                    </fieldset>
                                 </form>
                              </div>
                              <div class="tab-pane" id="tab_bio" disabled="disabled">
                                 <h2 class="hidden">&nbsp;</h2>
                                 <form class="form-horizontal" role="form">
                                    <fieldset>
                                    </fieldset>
                                 </form>
                              </div>
                              <div class="tab-pane" id="tab_address" disabled="disabled">
                                 <h2 class="hidden">&nbsp;</h2>
                                 <form class="form-horizontal" role="form">
                                    <fieldset>
                                    </fieldset>
                                 </form>
                              </div>
                              <div class="tab-pane" id="tab_address" disabled="disabled">
                                 <h2 class="hidden">&nbsp;</h2>
                                 <form class="form-horizontal" role="form">
                                    <fieldset>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<!--page level js start-->
<script type="text/javascript" src="{{ asset('assets/js/frontend/elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-rating/bootstrap-rating.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/cart.js') }}"></script>
<!--page level js start-->
<!--custom datatables-->
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/jeditable/js/jquery.jeditable.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}" ></script>
<script src="{{ asset('assets/vendors/bootstrap-slider/js/bootstrap-slider.js') }}" ></script>
<script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script>
   $('input[type="radio"].custom-radio').iCheck({
       radioClass: 'iradio_flat-blue',
       increaseArea: '20%'
   });
   $('input[type="radio"].custom-radio2').iCheck({
       radioClass: 'iradio_flat-blue',
       increaseArea: '20%'
   });
   $(function() {
       var jobButton,ageRadio,idSlider,professionSelect;
       var jobButton2,ageRadio2,idSlider2,professionSelect2;
   
       $('#buttonFemale').click(function () {
           jobButton='female';
           table4.draw();
       });
   
      
       $('.custom-radio2').on('ifChanged', function(event){
           ageRadio2 =  $(this).val();
           table5.draw();
       });
       $('#professions2').click(function () {
           professionSelect2 = $(this).val();
           table5.draw();
       });
       $('#buttonMale2').click(function () {
           jobButton2='male';
           table5.draw();
       });
       $('#buttonFemale2').click(function () {
           jobButton2='female';
           table5.draw();
       });
   
       var table5 = $('#table5').DataTable({
           processing: true,
           serverSide: true,
           "pageLength": 100,
            order:[[ 0, "desc" ]],
           ajax: {
               url: "{{ action('Members\MembersController@get_admins') }}",
               data: function (d) {
                   d.memberid='<?php echo $user->id;  ?>';
               }
           },
           columns: [
               { data: 'first_name', name: 'first_name' },
               { data: 'last_name', name: 'last_name' },
               { data: 'acc_no', name: 'acc_no' },
               { data: 'level', name: 'level' },
               { data: 'telephone', name: 'telephone' },
               { data: 'email', name: 'email' },
               { data: 'joined', name: 'joined' },
               { data: 'status', name: 'status' },
           ]
       });
   });
   
   $("#admins").addClass("active");
</script>
<!--end of custom datatables-->
@stop