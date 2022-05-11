@extends('layouts.admin')

@section('title', 'Edit Account')
@section('main')



<form action="{{route('account.update', $account->id)}}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
<input type="hidden" name="id" value="{{$account->id}}">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">User name</label>
                <input type="text" class="form-control" name="username" value="{{$account->username}}" placeholder="Input name user" disabled>
                @error('username')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$account->name}}" placeholder="Input name" disabled>
                @error('name')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" value="{{$account->address}}" placeholder="Input address" disabled>
                @error('address')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Role</label>
                <select name="role_id" class="form-control">
                    <option value="">--SELECT ONE--</option>
                @foreach($roles as $role)
                    @if ($role->id == $account->role_id)
                        <option value="{{$role->id}}" selected>{{$role->name}}</option>  
                    
                    @else <option value="{{$role->id}}">{{$role->name}}</option>                      
                
                    @endif
                @endforeach
                </select>                
                @error('role_id')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>                                
                <input type="text" class="form-control" name="email" value="{{$account->email}}" placeholder="Input email" disabled>
                @error('name')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phone number</label> 
                <input type="text" class="form-control" name="phone" value="{{$account->phone}}" placeholder="Input phone number" disabled>
                @error('phone')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save data</button>
</form>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-custom" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
            <iframe src="{{url('public/file/dialog.php')}}" style="width:100%; height: 500px; overflow-y:auto; border:none"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btnconfirm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var modelId = document.getElementById('modelId');

    modelId.addEventListener('show.bs.modal', function (event) {
          let button = event.relatedTarget;
          let recipient = button.getAttribute('data-bs-whatever');
    });
</script>

@stop

@section('css')
    <link rel="stylesheet" href="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.css">
@stop

@section('js')
    <script src="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.js"></script>
@stop