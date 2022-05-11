@extends('layouts.admin')

@section('title', 'Edit Product')
@section('main')



<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
<input type="hidden" name="id" value="{{$product->id}}">

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Input name">
                @error('name')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>                
                <textarea name="description" value="{{$product->description}}" id="content" class="form-control" placeholder="Input description"></textarea>                
                @error('description')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>            
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$product->slug}}" placeholder="Input name">
                @error('slug')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>            
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Category</label>

                <select name="category_id" class="form-control">
                    <option value="">--SELECT ONE--</option>
                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                </select>
                
                @error('category_id')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Sale</label>
                                
                <select name="sale_id" class="form-control">
                    <option value="">--SELECT ONE--</option>
                @foreach($sale as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                </select>
                
                @error('category_id')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Input price">
                @error('price')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" placeholder="Input sale price">
                @error('quantity')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="file_upload" value="{{$product->images}}" placeholder="Input name">
            </div>
                              
                @error('images')
                    <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">save data</button>
        </div>
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
        placeholder:"Input product description"
    });
  })
</script>
@stop