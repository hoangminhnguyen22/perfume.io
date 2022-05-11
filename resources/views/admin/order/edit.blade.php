@extends('layouts.admin')

@section('title', 'Order Detail')
@section('main')
<h1>Order Detail</h1>
<form action="{{route('order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$order->id}}">
    
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="id">Order ID</label>
                    <input type="text" name="orderid" class="form-control" value="{{$order->id}}" disabled>
                </div>

            </div>

            <div class="col-md-6">                
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $order->account->name }}" disabled>
                </div>
            </div>

            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id">Created date</label>
                    <input type="text" name="created_at" class="form-control" value="{{$order->created_at}}" disabled>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="id">Updated date</label>
                    <input type="text" name="updated_at" class="form-control" value="{{$order->updated_at}}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <h4>Detail</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orderDetails as $orderdetail)
                    <tr>            
                        <td>{{$orderdetail->product_id}}</td>
                        <td>{{$orderdetail->name}}</td>
                        <td>{{$orderdetail->images}}</td>
                        <td>{{$orderdetail->price}}</td>
                        <td>{{$orderdetail->amount}}</td>
                        <td>{{$orderdetail->total}}</td>     
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="row">

            <div class="col-md-9">

                <div class="form-group">
                    <label for="">Note</label>                
                    <textarea name="note" id="content" class="form-control" placeholder="Input description" disabled>{{ $order->note }}</textarea>                
                    @error('description')
                        <small class="help-block">{{$message}}</small>
                    @enderror
                </div>   

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Total</label>
                    <input type="text" name="total" class="form-control" value="{{$order->total}}" disabled>
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <br/>
                    <label class="switch">
                        @if ($order->status == 1)
                            <input type="checkbox" name="status" id="status" value="1" checked>
                            @else
                            <input type="checkbox" name="status" id="status" value="1">                            
                        @endif
                        <span class="slider round"></span>
                    </label> 
                </div> 

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save data</button>
    </form>

 
@stop

@section('css')
  <link rel="stylesheet" href="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{URL::asset('site')}}/css/toggleSwitch.css">
@stop

@section('js')
<!-- Summernote -->
<script src="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $('#content').summernote({
        height: 200,
        placeholder:"Input product description"
    });
  })
</script>
@stop