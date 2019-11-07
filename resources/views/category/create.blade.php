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

  <form action="{{ route('category.store') }}" method="post">

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




  </div>
</div>
  <button type="submit" class="btn btn-primary">save</button>
</form>
    {{--<div class="form-group">--}}
      {{--<label for="exampleInputEmail1">language</label>--}}
      {{--<select class="form-control" name="language">--}}
          {{--<option value="1">en</option>--}}
          {{--<option value="2">ar</option>--}}
      {{--</select>--}}
    {{--</div>--}}


                      </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection