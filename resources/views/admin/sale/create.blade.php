@extends('layouts.admin')

@section('title', 'Add Sale')
@section('main')



<form action="{{route('sale.store')}}" method="POST" role="form">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Input name">
    @error('name')
    <small class="help-block">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <div class="form-group">
        <label for="">Percent</label>
        <input type="text" class="form-control" name="percent" placeholder="Input name">
    </div>
    <div class="form-group">
        <label for="">Start date</label>
        <input type="date" class="form-control" name="start_date" placeholder="Input name">
        <label for="">End date</label>
        <input type="date" class="form-control" name="end_date" placeholder="Input name">
    </div>
</div>

<button type="submit" class="btn btn-primary">save data</button>
</form>



@stop