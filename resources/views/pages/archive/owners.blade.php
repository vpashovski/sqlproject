@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('archive.owners.index') }}
                </h3>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('archive.owners.fields.id') }}</th>
                        <th>{{ trans('archive.owners.fields.firstname') }}</th>
                        <th>{{ trans('archive.owners.fields.lastname') }}</th>
                        <th>{{ trans('archive.owners.fields.email') }}</th>
                        <th>{{ trans('archive.owners.fields.created_at') }}</th>
                        <th>{{ trans('archive.owners.fields.updated_at') }}</th>
                        <th>{{ trans('archive.owners.fields.deleted_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($owner_archives as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->firsntame }}</td>
                            <td>{{ $owner->lastname }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->created_at }}</td>
                            <td>{{ $owner->updated_at }}</td>
                            <td>{{ $owner->deleted_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! \App\OwnerArchive::paginate(config('constants.per_page')) !!}
                </div>
            </div>
        </section>
    </div>
    @include('partials.modals.destroy')
@endsection
