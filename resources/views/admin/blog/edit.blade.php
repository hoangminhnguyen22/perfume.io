@extends('layouts.admin')

@section('title', 'Edit Blog')
@section('main')



<form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
<input type="hidden" name="id" value="{{$blog->id}}">

        <div class="form-group">
            <div class="form-group">
                <label for="">Account ID</label>
                <input type="text" class="form-control" name="account_id" value="{{$blog->account_id}}" placeholder="Input name">
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="{{$blog->title}}" placeholder="Input name">
                @error('title')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Images</label>
                <input type="file" class="form-control" name="file_upload" placeholder="Input name">
            </div>
                              
                @error('images')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>  
                <!-- <input type="textarea" class="form-control" name="description" value="{{$blog->description}}" placeholder="Input name">     -->
                <textarea name="description" id="content" class="form-control" value="{{$blog->description}}" placeholder="Input description"></textarea>                
                @error('description')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>            
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$blog->slug}}"  placeholder="Input name">
                @error('slug')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>  
            <button type="submit" class="btn btn-primary">save data</button>          
        </div>
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
            <!-- href="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.css"> -->
            <!-- src="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.js" -->
            <iframe src="{{url('public/file/dialog.php')}}" style="width:100%; height: 500px; overflow-y:auto; border:none"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var modelId = document.getElementById('modelId');

    modelId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>




@stop
<!-- {{URL::asset('ad123')}} -->
@section('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.css">
@stop

@section('js')
<!-- Summernote -->
<script src="{{URL::asset('ad123')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $('#content').summernote({
        height:250,
        placeholder:"Input product description",
        value:"{{$blog->description}}" // lấy dữ liệu để sửa
    });
  })
</script>
@stop