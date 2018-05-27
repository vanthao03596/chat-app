@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chat room</div>
                <div class="card-body">
                    <div id="app">
                            <router-view></router-view>
                            <vue-progress-bar></vue-progress-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
@endpush

@stop