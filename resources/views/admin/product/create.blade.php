@extends('admin.include.master')
@push('css')
 <!-- Bootstrap CSS -->
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
 <!-- Summernote CSS -->
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{route('products.index')}}">Product</a>
            </li>
            <li class="active">Add Product Information</li>
        </ul>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-content font">
        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">New Item</h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <div id="fuelux-wizard-container" class="no-steps-container">
                        @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                       @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{route('products.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-4">
                            {{-- product name  --}}
                            <div class="form-group">
                                <label class="" for="name">Category :</label>
            
                                <div class="">
                                    <select name="category_id" id="" class="col-xs-12 col-md-11 col-sm-12" >
                                        <option value="">select category:</option> 
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option> 
                                        @endforeach
                                    </select>
                                    <br> <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- slider title  --}}
                            <div class="form-group">
                                <label class="">Name :</label>
            
                                <div class="">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Product Name"
                                        class="col-xs-12 col-md-11 col-sm-12" />
                                    <br> <br>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            {{-- price  --}}
                            <div class="form-group">
                                <label>Price :</label>
            
                                <div class="">
                                    <input type="text" value="{{old('price')}}" name="price" placeholder="Product price"
                                        class="col-xs-12 col-md-11 col-sm-12" />
                                    <br> <br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            {{-- Product Short Description  --}}
                            <div class="form-group">
                                <label class="">Short Description</label>
                                <div class="">
                                    <textarea id="summer" name="short_desp" placeholder="Short Description" class="col-xs-12 col-md-11 col-sm-12" >{{old('short_desp')}}</textarea>
                                    <br> <br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            {{-- slider title  --}}
                            <div class="form-group">
                                <label class="">Long Description (optional) :</label>
            
                                <div class="">
                                    <textarea name="long_desp" cols="30" rows="10" class="summernote">{{old('long_desp')}}</textarea>
                                    <br> <br>
                                </div>
                            </div>
                        </div>
                   
                        <div class="col-xs-6">
                           <label for=""> Preview Image:</label>
                            <label class="ace-file-input"><input name="preview" type="file" id="id-input-file-2" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                            <img src="" width="70px;" id="blah" alt="">
                        </div>
                        <div class="col-xs-6">
                            <label for=""> Thumbnail Image:</label>
                            <label class="ace-file-input"><input name="thumbnail[]" multiple onchange="previewImages(this)" type="file" id="id-input-file-2"><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                            <div id="image-preview-container" style="margin-right: 20px;">
                                <img src="" width="70px;" alt="">
                            </div>
                            
                        </div>
                    <hr>
                    <div class="wizard-actions">
                        <button type="submit" class="btn btn-success btn-next" data-last="Finish">
                            Save
                        </button>
                    </div><br><br>
                </form>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    {{-- summernote --}}
    <script>
        $(document).ready(function() {
            $('#summer').summernote();
        });

    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });

    </script>

<script>
    function previewImages(input) {
        var previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Clear previous previews

        if (input.files) {
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var imgElement = document.createElement('img');
                    imgElement.setAttribute('height', '50'); // Adjusted height
                    imgElement.setAttribute('width', '50');  // Adjusted width
                    imgElement.src = e.target.result;

                    previewContainer.appendChild(imgElement);
                };

                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>
   
@endpush
