<div class="form-group">
    {!! Form::select('course_id', $cursos, null, ['class' => 'form-control']) !!}
</div>       
<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
</div>
<div class="form-group">
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar', ['class' => 'btn btn-form']) !!}
</div>