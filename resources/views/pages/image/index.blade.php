@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('image.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                   href="{{ route('image.create') }}">
                    {{ trans('image.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('pages.image._filter')
                <div class="col-sm-12">
                    @foreach($images as $image)
                        <div class="thumbnail col-sm-3">
                            {!! Html::image($image->url, $image->title) !!}<br />

                            <p><span class="label label-default">{{ $image->title }}</span></p>

                            <a class="btn btn-sm btn-info"
                               href="{{ route('image.show',
                                    ['image' => $image->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-warning"
                               href="{{ route('image.edit',
                                    ['image' => $image->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a class="btn btn-sm btn-danger"
                               href="#destroyModal" data-toggle="modal"
                               data-url="{{ route('image.destroy',
                               ['image' => $image->id]) }}"
                               data-text="{{ trans('common.destroy_image',
                               ['id' => $image->id, 'title' => $image->title]) }}">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!! $images->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('partials.modals.destroy')
@endsection
