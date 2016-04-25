<div class="col-sm-12">
    @include('partials.errors')

    <div class="form-group">
        {!! Form::text('brand', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('car.fields.brand')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('model', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('car.fields.model')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('number', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('car.fields.number')]) !!}
    </div>

    @if(isset($car))
        <div class="form-group">
            {!! Form::submit(trans('car.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        </div>
    @else
        <div class="form-group">
            {!! Form::submit(trans('car.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
    @endif
</div>

@section('footer_script')
    {{-- {!! HTML::script('assets/js/images.js') !!} --}}
    <script>
        jQuery(function($) {
            $('.article-form').validate({
                rules: {
                    brand: {
                        required: true,
                        maxlength: 255
                    },
                    model: {
                        required: true,
                        maxlength: 255
                    },
                    number: {
                        required: true,
                        maxlength: 255
                    },
                }
            });
        });
    </script>
@endsection
