@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a style="margin-left: 200px" class="btn btn-primary" href= "{{ Route('posts.index') }} ">Posts Function</a>
                    <a style="margin-left: 40px" class="btn btn-primary" href= "{{ Route('products.index') }}">products Function</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
