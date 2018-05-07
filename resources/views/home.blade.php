@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Links</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>

            @foreach($links as $link)
                <div class="card my-4">
                    <div class="card-body">
                        <h5 class="my-0"><a href="{{ $link->url }}">{{ $link->title ?: $link->url }}</a></h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
