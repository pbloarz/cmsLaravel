
{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="form-group">
    {!! Form::label('name','Titulo') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
</div>
<div class="form-row">
    <div class="form-group col">
        {!! Form::label('category_id','Productos') !!}
        {!! Form::select('category_id', $productos , null, ['class'=>'form-control'] ) !!}
    </div>

</div>


