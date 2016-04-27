<div class="col-sm-12">
    @include('partials.errors')

    <div class="form-group">
        {!! Form::text('firstname', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('owner.fields.firstname')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('lastname', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('owner.fields.lastname')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('email', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('owner.fields.email')]) !!}
    </div>

    @if(isset($owner))
        <div class="form-group">
            {!! Form::submit(trans('owner.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        </div>
    @else
        <div class="form-group">
            {!! Form::submit(trans('owner.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
    @endif
</div>

@section('footer_script')
    {{-- {!! HTML::script('assets/js/images.js') !!} --}}
    <script>
        jQuery(function($) {
            $('.owner-form').validate({
                rules: {
                    firstname: {
                        required: true,
                        maxlength: 255
                    },
                    lastname: {
                        required: true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255
                    }
                }
            });
        });
    </script>
@endsection
