<div class="col-sm-9">
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
        @forelse($car->owners as $owner)
            <div class="form-group owners">
                <div class="col-sm-9 car-owners">
                    {!! Form::select('owners[]',
                    $owners,
                    $owner->id,
                    ['class' => 'form-control',
                    'placeholder' => trans('car.fields.owner')]) !!}
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-danger car-owners-remove"
                       href="javascript:void(0);">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a class="btn btn-success car-owners-add"
                       href="javascript:void(0);">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        @empty
            <div class="form-group cars">
                <div class="col-sm-9 car-owners">
                    {!! Form::select('owners[]',
                    $owners,
                    null,
                    ['class' => 'form-control',
                    'placeholder' => trans('car.fields.owner')]) !!}
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-danger car-owners-remove"
                       href="javascript:void(0);">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a class="btn btn-success car-owners-add"
                       href="javascript:void(0);">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforelse
    @else
        <div class="form-group owners">
            <div class="col-sm-9 car-owners">
                {!! Form::select('owners[]',
                $owners,
                null,
                ['class' => 'form-control',
                'placeholder' => trans('car.fields.owner')]) !!}
            </div>
            <div class="col-sm-3">
                <a class="btn btn-danger car-owners-remove"
                   href="javascript:void(0);">
                    <i class="fa fa-minus"></i>
                </a>
                <a class="btn btn-success car-owners-add"
                   href="javascript:void(0);">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    @endif

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
<div class="col-sm-3 well">
    @include('partials.right_form', isset($car) ? ['record' => $car] : [])
</div>

@section('footer_script')
    <script src="{{ URL::asset('assets/js/images.js') }}"></script>
    <script>
        jQuery(function($) {
            $('body').on('click', '.car-owners-remove', function() {
                var $this = $(this);
                if ($('.owners').size() > 1) {
                    $this.parents('.owners').remove();
                }
            }).on('click', '.car-owners-add', function() {
                var $this = $(this);
                $this.parents('.owners').after(
                        $this.parents('.owners').get(0).outerHTML
                );
            });

            $('.car-form').validate({
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
