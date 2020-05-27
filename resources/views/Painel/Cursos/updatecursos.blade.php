<div class="form-group">
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
</div>
<div class="form-group">
    {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url Curso:']) !!}
</div>
<div class="form-group">
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
</div>
<div class="form-group">
    {!! Form::file('image',['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código Curso HotMart:']) !!}
</div>
<div class="form-group">
    {!! Form::text('total_hours', null, ['class' => 'form-control', 'placeholder' => 'Total de Horas:']) !!}
</div>
<div class="form-group">
    <label>
        Publicar?
        {!! Form::checkbox('published', '1') !!}
    </label>
</div>
<div class="form-group">
    <label>
        Gratuito?
        {!! Form::checkbox('free') !!}
    </label>
</div>
<div class="form-group">
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Valor Total:']) !!}
</div>
<div class="form-group">
    {!! Form::text('price_plots', null, ['class' => 'form-control', 'placeholder' => 'Valor Parcela:']) !!}
</div>
<div class="form-group">
    {!! Form::text('total_plots', null, ['class' => 'form-control', 'placeholder' => 'Total de Parcelas:']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_buy', null, ['class' => 'form-control', 'placeholder' => 'Link Comprar HotMart:']) !!}
</div>


<div class="form-group">
    <input type="submit" value="Enviar" class="btn btn-form">
</div>