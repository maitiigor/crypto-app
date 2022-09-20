<div class="bg-light py-5 px-3 text-dark" style="width: 100%;">
    <div class="px-5">


        <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', isset($investmentPlan) && $investmentPlan->name ? $investmentPlan->name : '', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('amount', 'Amount', ['class' => 'form-label']) !!}
            {!! Form::number('amount', isset($investmentPlan) && $investmentPlan->amount ? $investmentPlan->amount : '', [
                'class' => 'form-control',
            ]) !!}

        </div>

        <div class="mb-3">
            {!! Form::label('max_amount', 'Max Amount', ['class' => 'form-label']) !!}
            {!! Form::number(
                'max_amount',
                isset($investmentPlan) && $investmentPlan->max_amount ? $investmentPlan->max_amount : '',
                ['class' => 'form-control'],
            ) !!}

        </div>
        <div class="mb-3">
            {!! Form::label('profit_percentage', 'Profit', ['class' => 'form-label']) !!}
            {!! Form::number(
                'profit_percentage',
                isset($investmentPlan) && $investmentPlan->profit_percentage ? $investmentPlan->profit_percentage : '',
                ['class' => 'form-control'],
            ) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('days_duration', 'Investment Duration', ['class' => 'form-label']) !!}
            {!! Form::number(
                'days_duration',
                isset($investmentPlan) && $investmentPlan->days_duration ? $investmentPlan->days_duration : '',
                ['class' => 'form-control'],
            ) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
            {!! Form::textarea(
                'description',
                isset($investmentPlan) && $investmentPlan->description ? $investmentPlan->description : '',
                ['class' => 'form-control', 'cols' => '40', 'rows' => '5'],
            ) !!}

        </div>
        <button class="btn btn-primary text-center" type="submit">
            Save
        </button>
    </div>
</div>
