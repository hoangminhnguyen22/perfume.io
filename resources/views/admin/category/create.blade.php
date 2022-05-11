@extends('layouts.admin')

@section('title', 'Add Category')
@section('main')



<form action="{{route('category.store')}}" method="POST" role="form">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Input name">
    @error('name')
    <small class="help-block">{{$message}}</small>
    @enderror
</div>


<button type="submit" class="btn btn-primary">save data</button>
</form>



@stop