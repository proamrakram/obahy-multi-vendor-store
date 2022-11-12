<form action="{{ route('admin.admins.update',['id'=>$admin->id]) }}"  enctype="multipart/form-data"  method="POST">
    @csrf
    <div class="bg-white p-3 rounded box-shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userName" class='font-sm'>@lang('adminPanel.name') <span class="text-danger">*</span> </label></div>
                    <div class="col-md-8">
                        <input type="text" name="update_name" id="userName" value="{{$admin->name}}" required class="form-control mb-2 @error('update_name') is-invalid @enderror" placeholder="@lang('adminPanel.name-ar')">
                        @error('update_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userphone_number" class='font-sm'> @lang('adminPanel.mobile-no') <span class="text-danger">*</span></label></div>
                    <div class="col-md-8"> <input name="update_phone_number" value="{{$admin->phone_number}}" required type="text" id="userphone_number" class="form-control @error('update_phone_number') is-invalid @enderror" placeholder="@lang('adminPanel.please-enter-11-numbers')">

                        @error('update_phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userName" class='font-sm'>@lang('adminPanel.email')  <span class="text-danger">*</span> </label></div>
                    <div class="col-md-8">
                        <input type="email" name="update_email" value="{{$admin->email}}" id="userName" required class="form-control mb-2 @error('update_email') is-invalid @enderror" placeholder="@lang('adminPanel.email')">
                        @error('update_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userphone_number" class='font-sm'>@lang('adminPanel.gender')  </label></div>
                    <div class="col-md-8">
                        <select name="update_gender" id="" class="form-control form-select @error('update_gender') is-invalid @enderror" required>
                            <option value="male" @if($admin->gender == 'male') selected @endif>@lang('adminPanel.male')  </option>
                            <option value="female" @if($admin->gender =='female') selected @endif> @lang('adminPanel.female')  </option>
                        </select>
                        @error('update_gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userphone_number" class='font-sm'>@lang('adminPanel.address')  <span class="text-muted" style='font-size: 10px'> @lang('adminPanel.optional') </span></label></div>
                    <div class="col-md-8"> <input name="update_address" value="{{$admin->address_1}}" type="text" id="userphone_number" class="form-control @error('update_address') is-invalid @enderror" placeholder="@lang('adminPanel.address')">
                        @error('update_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userphone_number" class='font-sm'> @lang('adminPanel.role')  </label></div>
                    <div class="col-md-8">
                        <select name="update_role" id="" class="form-control form-select @error('update_role') is-invalid @enderror" required>
                            @foreach($roles as $role)
                            <option value="{{$role->name}}" @if($admin->hasRole($role)) selected @endif> {{$role->name}} </option>
                            @endforeach
                        </select>
                        @error('update_role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row align-items-center mb-3">
                    <div class="col-md-4"><label for="userPassowrd" class='font-sm'> @lang('adminPanel.password')  <span class="text-danger">*</span></label></div>
                    <div class="col-md-8"> <input name="update_password" type="password" id="userPassowrd" class="form-control @error('update_password') is-invalid @enderror">
                        @error('update_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userImage" class='font-sm'> @lang('adminPanel.add-user-image') </label></div>
                                                <div class="col-md-8"> <div class="avatar-upload">
    <div class="avatar-edit"> 
        <input type='file' id="imageUpload2" name="update_image" accept=".png, .jpg, .jpeg" class="form-control   @error('update_image') is-invalid @enderror"/>
        <label for="imageUpload2"></label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview2" @if(!is_null($admin->image)) style="background-image: url({{$admin->image}});" @else style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});" @endif>
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
        <button type="submit" class="btn btn-dark px-5"> @lang('adminPanel.edit') </button>
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