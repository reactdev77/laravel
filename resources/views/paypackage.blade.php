<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
       <title>Package Payment | Stafflife</title>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       @if (App::environment('prod'))
           <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' checkout.stripe.com www.google-analytics.com www.googletagmanager.com; connect-src 'self' checkout.stripe.com; frame-src 'self' checkout.stripe.com; img-src 'self' 'unsafe-inline' * data:; style-src 'self' 'unsafe-inline' checkout.stripe.com fonts.googleapis.com; font-src 'self' 'unsafe-inline' fonts.gstatic.com fonts.googleapis.com data:; frame-src 'self' 'unsafe-inline' dmmdev.com;">
           <script>(function(b,m,h,a,g){b[a]=b[a]||[];b[a].push({"gtm.start":new Date().getTime(),event:"gtm.js"});var k=m.getElementsByTagName(h)[0],e=m.createElement(h),c=a!="dataLayer"?"&l="+a:"";e.async=true;e.src="https://www.googletagmanager.com/gtm.js?id="+g+c;k.parentNode.insertBefore(e,k)})(window,document,"script","dataLayer","GTM-K6GM83G");</script>
       @endif
      <!--global css starts-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
      <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
      <!--end of global css-->
      <!--page level css starts-->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
      <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/indexboth.css') }}">
      <!--end of page level css-->

<style>
    .stripe-button-el {
        background: #ee6f00 !important;
        padding: 5px 28px !important;
        border-radius: 0 !important;
        border: 0 !important;
        margin-top:20px !important;
        margin-bottom:20px !important;
    }
   
    .stripe-button-el span {
        display: block;
        position: relative;
        font-size: 17px !important;
        color: #ffffff !important;
        font-weight: 400 !important;
        font-family: 'Lato', sans-serif !important;
        text-shadow: none !important;
        box-shadow: none !important;
        background:  #ee6f00 !important;
        border-radius: 0 !important;
     }
    
     .box1 {
         text-align:center;
         margin-top:30px !important;
     }

    .box {
        margin-top:30px !important;
    }

    .body {
        padding-top:20px !important;
    }

    .center-voucher{
        margin-left: 25%;
    }

     @media screen and (min-width: 768px) {
            .mobilepr {
                display: none;
            }
        }

        @media screen and (max-width: 767px) {
            .desktpr {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 760px !important;
            }
        }
</style>

   </head>
   <body>
   @if (App::environment('prod'))
       <!-- Google Tag Manager (noscript) -->
       <noscript>
           <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6GM83G" height="0" width="0" style="display:none;visibility:hidden"></iframe>
       </noscript>
       <!-- End Google Tag Manager (noscript) -->
   @endif
      <div class="container">
         <!--Content Section Start -->
         <div class="row">
            <div class="box animation">
               <div class="box1">
                  <img src="{{ asset('assets/images/logostaff.png') }}" alt="logo" class="img-responsive mar">
                  <h3 class="text-primary">{{ __('loginsignup.notice') }}</h3>
                  <!-- Notifications -->
                  @include('notifications')
                  <div style="height:30px;"></div>
                  <label class="control-label">{{ __('loginsignup.noticetext') }}</label>
                  @if($userPayRow->sub_type == 0)
                  <form action="{{ action('SubscriptionsController@payPackageReturn') }}" method="POST">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />	
                     <input type='hidden' name='packageid' value='<?php echo $userPayRow->packageid; ?>' />
                     <input type='hidden' name='month_year' value='0' />
                     <input type='hidden' name='amount' value='<?php echo $userPayRow->AMOUNT; ?>' />
                     <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="<?=env('STRIPE_KEY', 'pk_test_FY9SDqgyUnVNxwXFKfd0uenR')?>"
                        data-name="StaffLife"
                        data-description="<?php ?>"
                        data-amount="<?php echo ($userPayRow->AMOUNT)*100; ?>"></script>
                        <center>
                        <div class="col-sm-6 center-voucher">
                        <div class="form-group">
                      <input type='text' class="form-control" name='voucher_number' placeholder="Voucher Number" value='' />
                      </div>
                      </div>
                      </center>
                  </form>
                  @endif
                  @if($userPayRow->sub_type == 1)
                  <form action="{{ action('SubscriptionsController@payPackageReturn') }}" method="POST">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <input type='hidden' name='packageid' value='<?php echo $userPayRow->packageid; ?>' />
                     <input type='hidden' name='month_year' value='1' />
                     <input type='hidden' name='amount' value='<?php echo $userPayRow->AMOUNT; ?>' />
                     <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="<?=env('STRIPE_KEY', 'pk_test_FY9SDqgyUnVNxwXFKfd0uenR')?>"
                        data-name="StaffLife"
                        data-description="<?php ?>"
                        data-amount="<?php echo ($userPayRow->AMOUNT)*100; ?>"></script>
                        <div class="col-sm-6 center-voucher">
                        <div class="form-group">
                     <input type='text' class="form-control" name='voucher_number' placeholder="Voucher Number" value='' />
                     </div>
                     </div>
                  </form>
                  {{--{!!  Form::close()  !!}--}}
                  @endif

                  <div style="text-align:center;">
                      <hr style="width:80%; color:#dadada; border-top: 1px solid #c5c5c5 !important;">
                      <img src="{{ asset('assets/images/stripe-payment.jpg') }}" style="max-width:200px">
                  </div>

               </div>
            </div>
         </div>


<div>
<div style="height:50px;"></div>
<div class="container" style="background-color:#ffffff; border:1px solid #dddddd; padding:20px; border-top: 5px solid #ee6f00;">
    <h3 style="text-align:center; font-size: 28px; line-height: 35px; font-weight: 400; color: #4caf50;">We guarantee - within 4 months</h3>
    <hr style="width:20%; border-top: 1px solid #dddddd; margin-top:0; margin-bottom:30px;">
    <div class="row">
    
        <div class="col-sm-4">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/productivity.png') }}">
                    </td>
                    <td>
                        <p class="stattext" style="padding-left:20px;">90% + in productivity</p>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="col-sm-4">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/badhires.png') }}">
                    </td>
                    <td>
                        <p class="stattext" style="padding-left:20px;">80% + in lower bad hires</p>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="col-sm-4">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/hrcost.png') }}">
                    </td>
                    <td>
                        <p class="stattext" style="padding-left:20px;">60% + in lower HR admin costs</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/bettertalent.png') }}">
                    </td>
                    <td>
                        <p class="stattext" style="padding-left:20px;">15% + in attracting better talent</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-4">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/morale.png') }}">
                    </td>
                    <td>
                        <p class="stattext" style="padding-left:20px;">Better company culture & morale</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-4">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/customer.png') }}">
                    </td>
                    <td>
                        <p class="stattext" style="padding-left:20px;">Higher revenues & customer retention</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div style="height:15px;"></div>
        <!-- Trigger the modal with a button -->
    <p style="text-align:center; padding-bottom:20px;" class="faqtextbig"><span style="margin-bottom:30px; font-size: 21px; font-weight: 300; line-height: 24px;">Or your money back!</span></p>
    <p style="text-align:center;"><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="color:#ffffff !important;">View Policy</button>
    </p>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
    
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#f0f0f0; border-radius:10px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="text-align:center;" class="homeheadingb">Guarantee Policy</h3>
                </div>
                <div class="modal-body">
                    <div class="mobilepr">
                        <h4 style="padding-bottom:10px;" class="homeheadingb">Subject to the following terms and
                            conditions, StaffLife will reimburse any Member triple of all paid fees to SL, up to USD35
                            000.</h4>
                        <p>The claim must reach StaffLife in writing (email or via the SL dashboard), between month 6
                            and 7 after the initial payment made to StaffLife. </p>
                        <p>The Member is required to setup at least 25% of employees (active) permitted within their
                            Package (on average over the six month period). </p>
                        <p>Members who claim will no longer be able to participate in any way within the StaffLife
                            system. This is to prevent Members who benefit from StaffLife but abuse our Guarantee
                            Policy. </p>
                        <p>Members who have claimed from StaffLife and attempt to join again using an alias or a
                            different company, will be reported to the local authorities for fraud, and liable for
                            repayment of the full reimbursement received, with interest and adjusted for inflation. </p>
                        <p>Members who are found to abuse the Guarantee Policy, by creating fictitious documentation or
                            accounts, will not be reimbursed and will be reported to the local authorities for
                            fraud.</p>
                        <p>StaffLife reserves the right to ban any Member from the StaffLife system, without
                            notice. </p>
                        <p>No reimbursement shall exceed USD35 000. </p>
                        <p>Processing of claims may take up to 30 days from the date upon which the claim reaches
                            StaffLife. </p>
                        <div style="height:10px;"></div>
                    </div>
                    <div class="desktpr">
                        <h4 style="padding-bottom:10px;" class="homeheadingb">Subject to the following terms and
                            conditions, StaffLife will reimburse any Member triple of all paid fees to SL, up to USD35
                            000.</h4>
                        <p>The claim must reach StaffLife in writing (email or via the SL dashboard), between month 6
                            and 7 after the initial payment made to StaffLife. </p>
                        <p>The Member is required to setup at least 25% of employees (active) permitted within their
                            Package (on average over the six month period). </p>
                        <p>Members who claim will no longer be able to participate in any way within the StaffLife
                            system. This is to prevent Members who benefit from StaffLife but abuse our Guarantee
                            Policy. </p>
                        <p>Members who have claimed from StaffLife and attempt to join again using an alias or a
                            different company, will be reported to the local authorities for fraud, and liable for
                            repayment of the full reimbursement received, with interest and adjusted for inflation. </p>
                        <p>Members who are found to abuse the Guarantee Policy, by creating fictitious documentation or
                            accounts, will not be reimbursed and will be reported to the local authorities for
                            fraud.</p>
                        <p>StaffLife reserves the right to ban any Member from the StaffLife system, without
                            notice. </p>
                        <p>No reimbursement shall exceed USD35 000. </p>
                        <p>Processing of claims may take up to 30 days from the date upon which the claim reaches
                            StaffLife. </p>
                        <div style="height:10px;"></div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:#f0f0f0; border-radius:10px;">
                    <p style="text-align:center;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </p>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>
         <!-- //Content Section End -->
      </div>
      <!--global js starts-->
      <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/frontend/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/frontend/login_custom.js') }}"></script>
      <!--global js end-->
      <script language="javascript" type="text/javascript">
         jQuery(document).ready(function () {
             jQuery(".stripe-button-el").submit();
         });
         
         jQuery(document).ready(function () {
             jQuery(".stripe-button-el").submit();
         });
      </script>
   </body>
</html>