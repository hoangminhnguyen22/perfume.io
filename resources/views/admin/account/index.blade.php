@extends('layouts.admin')

@section('title', 'Account List')
@section('main')

<form action="" class="form-inline">

    <div class="form-group">
        <input class="form-control" name="key" placeholder="Search by name">
    </div>
    

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Userame</th>
            <th>Password</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Blogs</th>
            <th>Rates</th>
            <th>Order</th>
            <th>date Create</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $acc)
        <tr>            
            <td>{{$acc->id}}</td>
            <td>{{$acc->role->name ?? 'none'}}</td>
            <td>{{$acc->username}}</td>
            <td>{{"***"}}</td>
            <td>{{$acc->name}}</td>
            <td>{{$acc->email}}</td>
            <td>{{$acc->phone}}</td>
            <td>{{$acc->address}}</td>
            <td>{{$acc->blogs->count()}}</td> <!-- blogs của model/Category-->
            <td>{{$acc->rates->count()}}</td> <!-- blogs của model/Category-->
            <td>{{$acc->orders->count()}}</td> <!-- blogs của model/Category-->
            <td>{{date('d-m-Y', strtotime($acc->create_at))}}</td>       
            <td class="text-right">
            
                <a href="{{route('account.edit', $acc->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('account.destroy', $acc->id)}}" class="btn btn-sm btn-danger btndelete">
                    <i class="fas fa-ban"></i>
                </a>
            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<form method="POST" action="" id="form-delete">
        @csrf @method('DELETE')
</form>
<hr>

 
@stop

@section('js')
<!--

        đặt biên ev, ev.preventDefault() để không load lại trang
        biến _href để lấy link hiện tại đang click vào $(this).attr('href')
        $('form#form-delete').attr('action',_href) để gán cái link hiện tại vào action của form delete
        https://hocwebchuan.com/reference/jquery/jquery_attr.php
-->
<script>
    $('.btndelete').click(function(ev){
        ev.preventDefault();
        var _href = $(this).attr('href');
        $('form#form-delete').attr('action',_href);
        if(confirm('xác nhân xóa')){
            $('form#form-delete').submit();
        }
    })
</script>

@stop