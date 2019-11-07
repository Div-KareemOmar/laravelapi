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


        <div class="row mt-50">
            <div class="col-md-8 col-md-offset-2">
                <h3>{{$title}}</h3>
                <div class="mt-30"></div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>discraption</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category_details as $c)
                            <tr>
                                <th scope="row">{{$c->id}}</th>
                                <td>{{$c->title}}</td>
                                <td>{{$c->description}}</td>
                            </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div><!-- /.row -->





                </div>
            </div>
        </div>
    </div>
</div>


@endsection