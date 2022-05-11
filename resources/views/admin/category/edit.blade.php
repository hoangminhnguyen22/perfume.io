@extends('layouts.admin')

@section('title', 'Edit Category')
@section('main')



<form action="{{route('category.update', $category->id)}}" method="POST" role="form">
@csrf @method('PUT')
<input type="hidden" name="id" value="{{$category->id}}">
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Input name">
    @error('name')
    <small class="help-block">{{$message}}</small>
    @enderror
</div>

<button type="submit" class="btn btn-primary">save data</button>
</form>



@stop