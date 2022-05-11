@extends('layouts.admin')

@section('title', 'Role List')
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
            <th>Name</th>
            <th>Total Account</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    <!-- protected $fillable = ['id', 'name', 'created_at', 'updated_at']; -->
    @foreach($data as $role)
        <tr>            
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>    
            <td>{{$role->accounts->count()}}</td>   
            <td class="text-right">
            
                <a href="{{route('role.edit', $role->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('role.destroy', $role->id)}}" class="btn btn-sm btn-danger btndelete">
                    <i class="fas fa-trash"></i>
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
<div class="">
    <!-- 
        khi chuyển trang url không giữ được các tham số nên thêm append vào 
        chỉnh sửa phân trang bằng cách vào folder Providers -> AppServiceProvider
        mất key sẽ không còn tác dụng tìm kiếm nữa nên phải giữ appends(request()->all())

    -->

    {{$data->appends(request()->all())->links()}}
</div>
 
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