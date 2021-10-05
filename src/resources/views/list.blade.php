@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Vocabulary
                        <small><button type="submit" class="btn btn-success js-add-voca">Thêm từ vựng</button></small>
                    </h1>

                </div>
                <!-- /.col-lg-12 -->
                @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{$item}}<br>
                            @endforeach
                        </div>
                    @endif
                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>English</th>
                            <th>Type</th>
                            <th>Vienamese</th>
                            <th>Example</th>
                            <th>Image</th>
                            <th>Created_at</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voca as $item)
                            <tr class="odd gradeX" align="center" style="line-height:110px" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->english}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->vietnamese}}</td>
                                <td>{{$item->example}}</td>
                                <td><img class="image-list" src="upload/vocabulary/{{$item->image}}" alt=""></td>
                                <td>{{$item->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a style="color:green" href="vocabulary/delete/{{$item->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a style="color:green" href="vocabulary/edit/{{$item->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>

        {{-- modal add-vocabulary --}}
        <div class="modal-add js-modal">
            <div class="modal-container js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="ti-close"></i>
                </div>
                <div class="modal-header">
                    <i class="bag ti-book"></i>Add Vocabulary
                </div>
                <form class="form-add-voca" action="vocabulary/add" method="POST" enctype="multipart/form-data" name = "myForm">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>English</label>
                        <input type="text" class="form-control" name="english" placeholder="Nhập từ tiếng anh" required/>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Nhập loại từ" required/>
                    </div>
                    <div class="form-group">
                        <label>Vietnamese</label>
                        <input type="text" class="form-control" name="vietnamese" placeholder="Nhập từ tiếng việt" required/>
                    </div>
                    <div class="form-group">
                        <label>Example</label>
                        <input class="form-control" name="example" placeholder="Nhập ví dụ" required/>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img id="uploadPreview" style="width: 100px; height: 100px;" />
                        <input id="uploadImage" type="file" class="form-control" name="image" onchange="PreviewImage();" />
                    </div>

                    <button type="submit" class="btn btn-default">Add word</button>
                <form>
            </div>
        </div>
        {{-- end modal add-vocabulary --}}
        <!-- /.container-fluid -->
    </div>

    <script>
        const btnAdd = document.querySelector('.js-add-voca');
        const modal = document.querySelector('.js-modal')
        const close = document.querySelector('.js-modal-close')
        const modalContainer = document.querySelector('.js-modal-container');

        function showModal(){
            modal.classList.add('open')
        }

        function closeModal(){
            modal.classList.remove('open')
        }

        btnAdd.addEventListener('click',showModal);

        close.addEventListener('click',closeModal)

        modalContainer.addEventListener('click', function(event){
            event.stopPropagation()
        })

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

        // function validate() {
        //     if( document.myForm.english.value == "" ) {
        //         alert( "Hãy nhập từ tiếng anh" );
        //         document.myForm.Name.focus() ;
        //         return false;
        //     }
        //     return true;
        // }
    </script>
@endsection
