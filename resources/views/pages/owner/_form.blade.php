<div class="col-sm-9">
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
        @forelse($owner->cars as $car)
        <div class="form-group cars">
            <div class="col-sm-9 owner-cars">
                {!! Form::select('cars[]',
                $cars,
                $car->id,
                ['class' => 'form-control',
                'placeholder' => trans('owner.fields.car')]) !!}
            </div>
            <div class="col-sm-3">
                <a class="btn btn-danger owner-cars-remove"
                   href="javascript:void(0);">
                    <i class="fa fa-minus"></i>
                </a>
                <a class="btn btn-success owner-cars-add"
                   href="javascript:void(0);">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        @empty
            <div class="form-group cars">
                <div class="col-sm-9 owner-cars">
                    {!! Form::select('cars[]',
                    $cars,
                    null,
                    ['class' => 'form-control',
                    'placeholder' => trans('owner.fields.car')]) !!}
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-danger owner-cars-remove"
                       href="javascript:void(0);">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a class="btn btn-success owner-cars-add"
                       href="javascript:void(0);">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforelse
    @else
    <div class="form-group cars">
        <div class="col-sm-9 owner-cars">
            {!! Form::select('cars[]',
            $cars,
            null,
            ['class' => 'form-control',
            'placeholder' => trans('owner.fields.car')]) !!}
        </div>
        <div class="col-sm-3">
            <a class="btn btn-danger owner-cars-remove"
               href="javascript:void(0);">
                <i class="fa fa-minus"></i>
            </a>
            <a class="btn btn-success owner-cars-add"
               href="javascript:void(0);">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    @endif

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
<div class="col-sm-3 well">
    @include('partials.right_form', isset($owner) ? ['record' => $owner] : [])
</div>

@section('footer_script')
    {!! Html::script('assets/js/images.js') !!}
    <script>
        jQuery(function($) {
            $('body').on('click', '.owner-cars-remove', function() {
                var $this = $(this);
                if ($('.cars').size() > 1) {
                    $this.parents('.cars').remove();
                }
            }).on('click', '.owner-cars-add', function() {
                var $this = $(this);
                $this.parents('.cars').after(
                    $this.parents('.cars').get(0).outerHTML
                );
            });

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
