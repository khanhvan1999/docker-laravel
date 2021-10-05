@extends('layout.index')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1>Từ vựng Tiếng Anh</h1>
                        <small>Chỉnh sửa</small>
                    </div>
                    <div class="col-lg-7">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    {{$item}} <br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

                        <form action="vocabulary/edit/{{$voca->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="">English</label>
                                <input type="text" name="english" id="" class="form-control" value="{{$voca->english}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text" name="type" id="" class="form-control" value="{{$voca->type}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Vietnamese</label>
                                <input type="text" name="vietnamese" id="" class="form-control" value="{{$voca->vietnamese}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Example</label>
                                <input type="text" name="example" id="" class="form-control" value="{{$voca->example}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <img src="upload/vocabulary/{{$voca->image}}" id="uploadPreview" style="width: 100px; height: 100px;" />
                                <input type="file" name="image" id="uploadImage" class="form-control" onchange="PreviewImage();">
                            </div>

                            <button type="submit" class="btn btn-default">Edit word</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
