@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Từ vựng Tiếng Anh
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{$item}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>

                    @endif
                    <form action="vocabulary/add" method="POST" enctype="multipart/form-data" name = "myForm" onsubmit = "return(validate());">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>English</label>
                            <input type="text" class="form-control" name="english" placeholder="Nhập từ tiếng anh" />
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" placeholder="Nhập loại từ" />
                        </div>
                        <div class="form-group">
                            <label>Vietnamese</label>
                            <input type="text" class="form-control" name="vietnamese" placeholder="Nhập từ tiếng việt" />
                        </div>
                        <div class="form-group">
                            <label>Example</label>
                            <input class="form-control" name="example" placeholder="Nhập ví dụ" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <img id="uploadPreview" style="width: 100px; height: 100px;" />
                            <input id="uploadImage" type="file" class="form-control" name="image" onchange="PreviewImage();" />
                        </div>

                        <button type="submit" class="btn btn-default">Add word</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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


