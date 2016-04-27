@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('owner.show') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('owner.index') }}">
                    {{ trans('owner.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {{--TODO--}}
                {{ $owner->firstname }}
                <br />
                {{ $owner->lastname }}
                <br />
                {{ $owner->email }}
            </div>
        </section>
    </div>
@endsection
