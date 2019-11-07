@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a href="project/1">elwarsha</a>
                        <a href="project/2">lolibook</a>
                        <a href="project/3">matajer</a>
                        <a href="project/4">petsstore</a>
                        <a href="project/5">sphinxapps</a>
                        <a href="project/6">youkal</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
