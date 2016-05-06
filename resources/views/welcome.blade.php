@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                    <br>
                    You can view all owners with cars <a href="{{ url('/home') }}">here</a>.
                    <br>
                    Or you can <a href="{{ url('/login') }}">{{ trans('common.login') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
