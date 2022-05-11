@extends('layouts.admin')

@section('title', 'Sale List')
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
            <th>Product Name</th>
            <th>Percent</th>
            <th>Start</th>
            <th>End</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    <!-- protected $fillable = ['id', 'name', 'percent', 'start_date', 'end_date', 'created_at', 'updated_at']; -->
    @foreach($data as $sale)
        <tr>            
            <td>{{$sale->id}}</td>
            <td>{{$sale->name}}</td>
            <td>{{$sale->product->name ?? 'None'}}</td>
            <td>{{$sale->percent}}%</td>
            <td>{{date('d-m-Y', strtotime($sale->start_date))}}</td>
            <td>{{date('d-m-Y', strtotime($sale->end_date))}}</td>        
            <td class="text-right">
            
                <a href="{{route('sale.edit', $sale->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('sale.destroy', $sale->id)}}" class="btn btn-sm btn-danger btndelete">
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