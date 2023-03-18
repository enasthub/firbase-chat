@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @{{ msg }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <ul class="list-group" id="listUsers">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('script')
@endsection
