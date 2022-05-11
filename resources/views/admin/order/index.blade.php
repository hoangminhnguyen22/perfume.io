@extends('layouts.admin')

@section('title', 'Order List')
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
            <th>Account ID</th>
            <th>Account</th>
            <th>Name</th>
            <th>Note</th>
            <th>Status</th>
            <th>Total</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    <!-- protected $fillable = ['id', 'account_id', 'note', 'status', 'total', 'created_at', 'updated_at']; -->
    @foreach($data as $order)
        <tr>            
            <td>{{$order->id}}</td>
            <td>{{$order->account_id ?? 'none'}}</td>
            <td>{{$order->account->username ?? 'none'}}</td>
            <td>{{$order->account->name ?? 'none'}}</td>
            <td>{{$order->note}}</td>
            <td>
                @if($order->status == 0)
                    <span class="badge badge-danger">preparing</span>
                @else
                    <span class="badge badge-success">delivered</span>
                @endif
            </td>
            <td>{{$order->total}}</td>     
            <td class="text-right">
            
                <a href="{{route('order.edit', $order->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{route('order.destroy', $order->id)}}" class="btn btn-sm btn-danger btndelete">
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