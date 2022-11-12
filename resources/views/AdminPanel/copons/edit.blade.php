<form action="{{ route('admin.copons.update',['id'=>$copon->id]) }}" method="POST">
    @csrf
    <div class="bg-white p-3 rounded box-shadow">
                                    <input type="text" id="catName" name="update_copon_code"  required    value="{{$copon->copon_code}}"  class="form-control mb-2 @error('update_copon_code') is-invalid @enderror" placeholder="@lang('adminPanel.copon-code')  "> 
                                    @error('update_copon_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="update_copon_amount" id="catName"  required   value="{{$copon->copon_amount}}" class="form-control mb-2 @error('update_copon_amount') is-invalid @enderror" placeholder="@lang('adminPanel.copon-amount')  "> 
                                                    @error('update_copon_amount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <select name="update_copon_type" id="" required   class="form-control form-select  mb-2 @error('update_copon_type') is-invalid @enderror">
                                                    <option value="">@lang('adminPanel.copon-type')   </option>
                                        <option value="fixed" @if($copon->copon_type=='fixed' )selected @endif>@lang('adminPanel.fixed')   </option>
                                        <option value="percentage" @if($copon->copon_type=='percentage' )selected @endif>@lang('adminPanel.percentage')  </option>
                                    </select>@error('update_copon_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                    <select name="update_is_free_shipping" id="" required   class="form-control form-select  mb-2 @error('update_is_free_shipping') is-invalid @enderror">
                                        <option value="" >@lang('adminPanel.is_free_shipping')   </option>
                                        <option value="1" @if($copon->is_free_shipping=="1" )selected @endif> @lang('adminPanel.yes')</option>
                                        <option value="0" @if($copon->is_free_shipping=="0" )selected @endif> @lang('adminPanel.no') </option>
                                    </select>@error('update_is_free_shipping')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                    <select name="update_exclode_offers" id=""  required  class="form-control form-select  mb-2 @error('update_exclode_offers') is-invalid @enderror">
                                        <option value="" >@lang('adminPanel.exclode-offers')  </option>
                                        <option value="1" @if($copon->exclode_offers=="1" )selected @endif> @lang('adminPanel.yes')  </option>
                                        <option value="0" @if($copon->exclode_offers=="0" )selected @endif> @lang('adminPanel.no') </option>
                                    </select>   @error('update_exclode_offers')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror                                                                          

                                    <input type="text"  name="update_copon_limit" id="catName"   required  value="{{ $copon->copon_limit }}" class="form-control mb-2 @error('update_copon_limit') is-invalid @enderror" placeholder="@lang('adminPanel.copon-limit')  "> 
                                    @error('update_copon_limit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <input type="text"  name="update_use_count_all" id="catName"  required   value="{{ $copon->use_count_all }}" class="form-control mb-2 @error('update_use_count_all') is-invalid @enderror" placeholder="@lang('adminPanel.use-count-all') "> 
                                                    @error('update_use_count_all')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="update_user_use_count" id="catName"  required   value="{{ $copon->user_use_count }}" class="form-control mb-2 @error('update_user_use_count') is-invalid @enderror" placeholder="@lang('adminPanel.user-use-count')  "> 
                                                    @error('update_user_use_count')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <input type="date" name="update_expire_date" id="catName" required  value="{{ $copon->expire_date }}" class="form-control mb-2 @error('update_expire_date') is-invalid @enderror" placeholder="@lang('adminPanel.expire-date')  "> 
                                                    @error('update_expire_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                              

                                                    <select name="update_store_id" id="" required   class="form-control form-select  mb-2 @error('update_store_id') is-invalid @enderror">
                                                    <option value="">@lang('adminPanel.store')   </option>
                                                    @foreach($stores as $store)
                                        <option value="{{$store->id}}" @if($copon->store_id== $store->id )selected @endif>{{$store->getName()}} </option>
                                        @endforeach
                                    </select>@error('update_store_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                                               
                                </div>

    <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-dark px-5">@lang('adminPanel.edit')</button>
    </div>

</form>