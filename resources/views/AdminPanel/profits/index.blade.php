@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mb-3">
                <div class="d-flex justify-content-between p-3  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h5 ps-5"> @lang('adminPanel.total-profit-details')  </h6>
                </div>
            </div>
            <div class="filter-search">
                <div class="heading d-flex justify-content-between align-items-center pe-3">
                    <h4 class="h5"> @lang('adminPanel.filter') </h4>
                    <i class="uil uil-filter"></i>
                </div>
                <div class="content p-4 border">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="row align-items-center">
                                <div class="col-2"><label for=""> @lang('adminPanel.from')</label></div>
                                <div class="col-8">
                                    <input type="date"  name="from_date"   class='form-control'>                                    
                                </div>                              
                            </div>
                        </div>

                         <div class="col-md-6 col-12">
                            <div class="row align-items-center">
                                <div class="col-2"><label for=""> @lang('adminPanel.to') </label></div>
                                <div class="col-8">
                                   <input type="date"  name="to_date"   class='form-control'>                                      
                                </div>                              
                            </div>
                         </div>
                         
                                 
 
                    </div>
                </div>
            </div>  <!-- /. end Filter -->
<div class="search_result">
    @include('AdminPanel.profits.search')
</div>
            
           
        </div>         
    </div><!--end container-->
    @endsection

    @section('script')
<script>

    $(document).ready(function() {
function filter($from_date,$to_date)
 {
     
$.ajax({
    url: "/admin/profits/search?from_date="+$from_date+"&to_date="+$to_date,
    success: function(data) {
        $('.search_result').html('');
         $('.search_result').html(data);
    }

})
 }
 
$("[name=from_date],[name=to_date]").change(function() {

var from_date = $("[name=from_date]").val();
var to_date = $("[name=to_date]").val();

filter(from_date,to_date);
});


    });
</script>
@endsection
