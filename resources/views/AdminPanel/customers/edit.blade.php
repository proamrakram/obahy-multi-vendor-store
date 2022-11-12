<form action="{{ route('admin.customers.update',['id'=>$customer->id]) }}"  enctype="multipart/form-data"  method="POST">
    @csrf
    <div class="bg-white p-3 rounded box-shadow">

       <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="name" class='font-sm'>@lang('adminPanel.name') </label></div>
                                                <div class="col-md-9"> <input type="text" value="{{$customer->name}}" name="update_name" id="name"  required class="form-control @error('update_name') is-invalid @enderror">
                                                    @error('update_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="phone_number" class='font-sm'>@lang('adminPanel.mobile-no')</label></div>
                                                <div class="col-md-9"> <input type="text" value="{{$customer->phone_number}}" name="update_phone_number" id="phone_number" required class="form-control @error('update_phone_number') is-invalid @enderror">
                                                    @error('update_phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="City" class='font-sm'>@lang('adminPanel.country')</label></div>
                                                <div class="col-md-9"> <select name="update_country_id" id="" class="form-control form-select @error('update_country_id') is-invalid @enderror" required>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($customer->country_id==$country->id )selected @endif>{{$country->getName()}} </option>
                                                        @endforeach
                                                    </select> @error('update_country_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="postCode" class='font-sm'>@lang('adminPanel.post-code')</label></div>
                                                <div class="col-md-9"> <input name="update_postCode" value="{{$customer->postCode}}" type="text" id="postCode" required class="form-control @error('update_postCode') is-invalid @enderror">
                                                    @error('update_postCode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="email" class='font-sm'>@lang('adminPanel.email') </label></div>
                                                <div class="col-md-9"> <input type="text" value="{{$customer->email}}" name="update_email" id="email" required class="form-control @error('update_email') is-invalid @enderror">
                                                    @error('update_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="userPassowrd" class='font-sm'>@lang('adminPanel.password')</label></div>
                                                <div class="col-md-9"> <input name="update_password" type="password" id="userPassowrd" class="form-control @error('update_password') is-invalid @enderror">
                                                    @error('update_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-2"><label for="date" class='font-sm'>@lang('adminPanel.birthday')</label></div>
                                                <div class="col-md-10"> <input type="date" name="update_birthdate" value="{{$customer->birthdate}}" required id="date" class="form-control @error('update_birthdate') is-invalid @enderror">
                                                    @error('update_birthdate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-2"><label for="type" class='font-sm'>@lang('adminPanel.gender') </label></div>
                                                <div class="col-md-10"> <select name="update_gender" id="" class="form-control form-select @error('update_gender') is-invalid @enderror" required>
                                                        <option value="male" @if($customer->gender=='male' )selected @endif> @lang('adminPanel.male')  </option>
                                                        <option value="female" @if($customer->gender=='female' )selected @endif>@lang('adminPanel.female')  </option>
                                                    </select>
                                                    @error('update_gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="row align-items-center ">
                                                <div class="col-md-2"><label for="userImage" class='font-sm'> @lang('adminPanel.add-user-image') </label></div>
                                                <div class="col-md-10"><div class="avatar-upload  @error('update_image') is-invalid @enderror">
    <div class="avatar-edit"> 
        <input type='file' id="imageUpload2" name="update_image" accept=".png, .jpg, .jpeg" class="form-control "/>
        <label for="imageUpload2"></label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview2" @if(!is_null($customer->image)) style="background-image: url({{$customer->image}});" @else style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});" @endif>
        </div>
    </div>
</div>   
 @error('update_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    </div>

    <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-dark px-5">@lang('adminPanel.edit')</button>
    </div>

</form>

<script>
     function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview2').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview2').hide();
            $('#imagePreview2').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload2").change(function() {
    readURL2(this);
});
</script>