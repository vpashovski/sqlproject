@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('other.used_images.index') }}
                </h3>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('other.used_images.fields.id') }}</th>
                        <th>{{ trans('other.used_images.fields.thumb') }}</th>
                        <th>{{ trans('other.used_images.fields.title') }}</th>
                        <th>{{ trans('other.used_images.fields.ext') }}</th>
                        <th>{{ trans('other.used_images.fields.created_at') }}</th>
                        <th>{{ trans('other.used_images.fields.updated_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result['id'] }}</td>
                            <td>{!! Html::image($result['url'], 'thumb', ['width' => 70, 'height' => 70]) !!}</td>
                            <td>{{ $result['title'] }}</td>
                            <td>{{ $result['ext'] }}</td>
                            <td>{{ $result['created_at'] }}</td>
                            <td>{{ $result['updated_at'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
