{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-row">

    <div class="col-md-6 mb-3">
        {!! Form::label('stock','Cantidad de existencias') !!}
        {!! Form::number('stock', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        {!! Form::label('actualPrice','Precio normal') !!}
            <div class="input-group">
                 <div class="input-group-prepend">
                      <span class="input-group-text">s/</span>
                 </div>
                 {!! Form::number('actualPrice', null, ['class'=>'form-control', 'step'=>'0.01', 'id'=>'price']) !!}
                 <div class="input-group-append">
                      <span class="input-group-text">PEN</span>
                 </div>
            </div>
    </div>


</div>
<div class="form-group">
    {!! Form::label('longDescription','Descripción larga') !!}
    {!! Form::textarea('longDescription', null, ['class'=>'form-control']) !!}
</div>







