@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('item.store') }}" enctype="multipart/form-data" method="post">

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#en">en</a></li>
                                <li><a data-toggle="tab" href="#ar">ar</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="en" class="tab-pane fade in active">

                                    <div class="form-group">
                                        @csrf

                                        <label for="exampleInputEmail1">title en</label>
                                        <input type="text" name="title[]" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">description en</label>
                                        <textarea id="desc" name="description[]" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">

                                    <label for="price">price en</label>
                                    <input type="text" name="price[]" class="form-control" id="price" aria-describedby="emailHelp" placeholder="Enter price">

                                    </div>



                                </div>
                                <div id="ar" class="tab-pane fade">


                                    <div class="form-group">
                                        @csrf

                                        <label for="exampleInputEmail1">title ar</label>
                                        <input type="text" name="title[]" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">description ar</label>
                                        <textarea id="desc" name="description[]" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">

                                        <label for="price">price ar</label>
                                        <input type="text" name="price[]" class="form-control" id="price" aria-describedby="emailHelp" placeholder="Enter price">

                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="img">price ar</label>
                                <input type="file" id="img" name="img">

                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>


                    </div>

                </div>


            </div>
        </div>
    </div>
    </div>
    </div>

@endsection