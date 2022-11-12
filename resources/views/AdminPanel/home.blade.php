@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
        <div class="layout-specing">
            <h4>@lang('adminPanel.platform-stats') </h4>
            <div class="statistic-admin mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="statistic statistic-visits p-4 rounded-3 text-white mb-3">
                            <div class="top d-flex aligns-items-center justify-content-between">
                                <div class='d-flex align-items-center'>
                                    <img src="{{asset('assets/images/icon/icon-group.svg')}}" width="50" alt="">
                                    <h4 class='ps-4 h5'>@lang('adminPanel.total-subscribers') </h4>
                                </div>
                                <div>
                                    <span class="h1">{{$stores_count}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="bottom text-center d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block">@lang('adminPanel.free') </span>
                                    <span class="d-block">{{$free_stores_count}}</span>
                                </div>
                                <div>
                                    <span class="d-block">{{$first_package->getName()}}</span>
                                    <span class="d-block">{{$first_package_stores_count}}</span>
                                </div>  
                                <div>
                                    <span class="d-block">{{$secound_package->getName()}}</span>
                                    <span class="d-block">{{$secound_package_stores_count}}</span>
                                </div>     
                                <a href="{{route('admin.stores.index')}}" class='btn btn-white'>@lang('adminPanel.details')  </a>                                                            
                            </div>
                        </div>
                    </div>
                    <!-- End Box -->

                    <div class="col-md-6">
                        <div class="statistic statistic-products p-4 rounded-3 text-white mb-3">
                            <div class="top d-flex aligns-items-center justify-content-between">
                                <div class='d-flex align-items-center'>
                                    <img src="{{asset('assets/images/icon/eye-solid.svg')}}" width="50" alt="">
                                    <h4 class='ps-4 h5'>@lang('adminPanel.total-visits') </h4>
                                </div>
                                <div>
                                    <span class="h1">200</span>
                                </div>
                            </div>
                            <hr>
                            <div class="bottom text-center d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block">@lang('adminPanel.Now')</span>
                                    <span class="d-block">120</span>
                                </div>
                                <a href="" class='btn btn-white'>@lang('adminPanel.details') </a>                                                            
                            </div>
                        </div>
                    </div>
                    <!-- End Box-->
                    
                    <div class="col-md-6">
                        <div class="statistic statistic-sales p-4 rounded-3 text-white mb-3">
                            <div class="top d-flex aligns-items-center justify-content-between">
                                <div class='d-flex align-items-center'>
                                    <img src="{{asset('assets/images/icon/poll-solid.svg')}}" width="50" alt="">
                                    <h4 class='ps-4 h5'>@lang('adminPanel.total-sales') </h4>
                                </div>
                                <div>
                                    <span class="h1">{{$sales_count}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="bottom text-center d-flex align-items-center justify-content-end">
                                <a href="{{route('admin.sales.index')}}" class='btn btn-white'>@lang('adminPanel.details') </a>                                                            
                            </div>
                        </div>
                    </div>
                    <!-- End Box--> 
                    
                    <div class="col-md-6">
                        <div class="statistic statistic-users p-4 rounded-3 text-white mb-3">
                            <div class="top d-flex aligns-items-center justify-content-between">
                                <div class='d-flex align-items-center'>
                                    <img src="{{asset('assets/images/icon/sort-amount-up-alt-solid.svg')}}" width="50" alt="">
                                    <h4 class='ps-4 h5'>@lang('adminPanel.total-orders') </h4>
                                </div>
                                <div>
                                    <span class="h1">{{$orders_count}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="bottom text-center d-flex align-items-center justify-content-end">
                                <a href="{{route('admin.orders.index')}}" class='btn btn-white'>@lang('adminPanel.details')  </a>                                                            
                            </div>
                        </div>
                    </div>
                    <!-- End Box-->                     


                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="border rounded-3 shadow-sm p-3 bg-white mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <h5>@lang('adminPanel.number-of-subscribers') </h5>
                                <select name="" id="" class="form-group">
                                    <option value="">@lang('adminPanel.choose-package-type') </option>
                                    @foreach($packages as $package)
                                    <option value="{{$package->id}}">{{$package->getName()}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <canvas id="memberNumber"></canvas>
                        </div>                 
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 shadow-sm p-3 bg-white mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <h5>@lang('adminPanel.visits') </h5>
                       
                            </div>
                            <canvas id="memberNumber2"></canvas>
                        </div>                         
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 shadow-sm p-3 bg-white mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <h5>@lang('adminPanel.sales') </h5>
                            </div>
                            <canvas id="memberNumber3"></canvas>
                        </div>                         
                    </div>
                    
                    <div class="col-md-6">
                        <div class="border rounded-3 shadow-sm p-3 bg-white mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <h5>@lang('adminPanel.orders') </h5>
                            </div>
                            <canvas id="memberNumber4"></canvas>
                        </div>                         
                    </div>                    
                </div>
            </div>
        </div>   
    </div><!--end container-->
@endsection
@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>

<script>
var ctx = document.getElementById("memberNumber");
 
var ctx2 = document.getElementById("memberNumber2");
var ctx3 = document.getElementById("memberNumber3");
var ctx4 = document.getElementById("memberNumber4");

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["{{$months[0]}}", "{{$months[1]}}", "{{$months[2]}}", "{{$months[3]}}", "{{$months[4]}}", "{{$months[5]}}", "{{$months[6]}}", "{{$months[7]}}"],
        datasets: [{
            label: '# of Member',
            data: ["{{$stores[0]}}", "{{$stores[1]}}", "{{$stores[2]}}", "{{$stores[3]}}", "{{$stores[4]}}", "{{$stores[5]}}", "{{$stores[6]}}", "{{$stores[7]}}"],
            backgroundColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
}); 


var myChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ["{{$months[0]}}", "{{$months[1]}}", "{{$months[2]}}", "{{$months[3]}}", "{{$months[4]}}", "{{$months[5]}}", "{{$months[6]}}", "{{$months[7]}}"],
        datasets: [{
            label: '# of Member',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
}); 


var myChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ["{{$months[0]}}", "{{$months[1]}}", "{{$months[2]}}", "{{$months[3]}}", "{{$months[4]}}", "{{$months[5]}}", "{{$months[6]}}", "{{$months[7]}}"],
        datasets: [{
            label: '# of Member',
            data: ["{{$sales[0]}}", "{{$sales[1]}}", "{{$sales[2]}}", "{{$sales[3]}}", "{{$sales[4]}}", "{{$sales[5]}}", "{{$sales[6]}}", "{{$sales[7]}}"],
            backgroundColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
}); 


var myChart = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ["{{$months[0]}}", "{{$months[1]}}", "{{$months[2]}}", "{{$months[3]}}", "{{$months[4]}}", "{{$months[5]}}", "{{$months[6]}}", "{{$months[7]}}"],
        datasets: [{
            label: '# of Member',
            data: ["{{$orders[0]}}", "{{$orders[1]}}", "{{$orders[2]}}", "{{$orders[3]}}", "{{$orders[4]}}", "{{$orders[5]}}", "{{$stores[6]}}", "{{$stores[7]}}"],
            backgroundColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
}); 

</script>
@endsection
