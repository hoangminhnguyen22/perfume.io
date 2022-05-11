@extends('layouts.admin')

@section('title', 'Edit Role')
@section('main')



<form action="{{route('role.update', $role->id)}}" method="POST" role="form">
@csrf @method('PUT')
<input type="hidden" name="id" value="{{$role->id}}">
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" value="{{$role->name}}" placeholder="Input name">
    @error('name')
    <small class="help-block">{{$message}}</small>
    @enderror
</div>

<button type="submit" class="btn btn-primary">save data</button>
</form>



@stop