@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('owner.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                   href="{{ route('owner.create') }}">
                    {{ trans('owner.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('pages.owner._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('owner.fields.firstname') }}</th>
                        <th>{{ trans('owner.fields.lastname') }}</th>
                        <th>{{ trans('owner.fields.email') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->firstname }}</td>
                            <td>{{ $owner->lastname }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                   href="{{ route('owner.show',
                                    ['owner' => $owner->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                   href="{{ route('owner.edit',
                                    ['owner' => $owner->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('owner.destroy',
                                    ['owner' => $owner->id]) }}"
                                   data-text="{{ trans('common.destroy_owner',
                                   ['id' => $owner->id]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $owners->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('partials.modals.destroy')
@endsection
