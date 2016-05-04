@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('owner.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('owner.index') }}">
                    {{ trans('owner.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($owner, ['method' => 'PATCH', 'files' => true,
                    'url' => route('owner.update', ['owner' => $owner]),
                    'class' => 'owner-form']) !!}
                @include('pages.owner._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    @include('partials.modals.select_image')
    @include('partials.modals.upload_image')
@endsection
