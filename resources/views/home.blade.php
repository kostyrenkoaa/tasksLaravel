@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Задачи</h1></div>
                <div class="card-body">
                    <app-component
                        :priorities="{{$priorities}}"
                        :statuses="{{$statuses}}"
                    ></app-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
