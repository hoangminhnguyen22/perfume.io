@extends('layouts.site')
@section('main')

<section class="blog-details-hero set-bg" data-setbg="{{URL::asset('site')}}/img/account.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2 style="color: #252525">Thông tin khách hàng</h2>
                    <ul>
                        <li style="color: #252525">{{ Auth::user()->name }}</li>
                        <li style="color: #252525">{{ Auth::user()->created_at }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <form action="{{route('info_customer.update')}}" method="POST" enctype="multipart/form-data">
            @csrf @method('POST')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Input name user">
                        @error('name')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" placeholder="Input address">
                        @error('address')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Input address">
                        @error('email')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">User name</label>
                        <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" placeholder="Input name user" disabled>
                        @error('username')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" class="form-control" name="role" value="@if(Auth::user()->role_id==1){{"Quản lý"}}@elseif(Auth::user()->role_id==2){{"Nhân viên"}}@elseif(Auth::user()->role_id==3){{"Thành viên"}}@endif
                        " placeholder="Input address" disabled>
                        @error('role')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Input address">
                        @error('phone')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-warning">Save</button>
            </div>
        </form>
    </div>
</section>



@stop();
