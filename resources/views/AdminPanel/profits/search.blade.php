<div class="row mt-3">
                <div class="col-md-4">
                    <div class="mb-3 bg-white rounded-3 shadow-sm border">
                        <h2 class='h5 p-3 border-bottom'>@lang('adminPanel.products-cost')  </h2>
                        <div class="d-flex algin-items-center justify-content-between p-3">
                            <div class="number">
                                <div>{{$products_cost}}</div>
                                <p>@lang('adminPanel.riyal')</p>
                            </div>
                            <div class="icon">
                                <img src="{{asset('assets/images/icon/dollar-sign-solid.svg')}}" width='40' alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3 bg-white rounded-3 shadow-sm border">
                        <h2 class='h5 p-3 border-bottom'>@lang('adminPanel.total-sales')  </h2>
                        <div class="d-flex algin-items-center justify-content-between p-3">
                            <div class="number">
                                <div>{{$sales_cost}}</div>
                                <p>@lang('adminPanel.riyal')</p>
                            </div>
                            <div class="icon">
                                <img src="{{asset('assets/images/icon/hand-holding-usd-solid.svg')}}" width='80' alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3 bg-white rounded-3 shadow-sm border">
                        <h2 class='h5 p-3 border-bottom'>@lang('adminPanel.total-profit')  </h2>
                        <div class="d-flex algin-items-center justify-content-between p-3">
                            <div class="number">
                                <div>{{$total_profit}}</div>
                                <p>@lang('adminPanel.riyal')</p>
                            </div>
                            <div class="icon">
                                <img src="{{asset('assets/images/icon/coins-solid.svg')}}" width='70' alt="">
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="col-md-4">
                    <div class="mb-3 bg-white rounded-3 shadow-sm border">
                        <h2 class='h5 p-3 border-bottom'>@lang('adminPanel.payment-commissions')  </h2>
                        <div class="d-flex algin-items-center justify-content-between p-3">
                            <div class="number">
                                <div>3000</div>
                                <p>@lang('adminPanel.riyal')</p>
                            </div>
                            <div class="icon">
                                <img src="{{asset('assets/images/icon/money-check-solid.svg')}}" width='70' alt="">
                            </div>
                        </div>
                    </div>
                </div>   
                
                <div class="col-md-4">
                    <div class="mb-3 bg-white rounded-3 shadow-sm border">
                        <h2 class='h5 p-3 border-bottom'>@lang('adminPanel.tax')  </h2>
                        <div class="d-flex algin-items-center justify-content-between p-3">
                            <div class="number">
                                <div>{{$tax}}</div>
                                <p>@lang('adminPanel.riyal')</p>
                            </div>
                            <div class="icon">
                                <img src="{{asset('assets/images/icon/percentage-solid.svg')}}" width='60' alt="">
                            </div>
                        </div>
                    </div>
                </div>                   
                
                
            </div>
