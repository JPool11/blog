<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">
        Etiquetas
    </p>

    @foreach ($tags as $tag)
        <label class="mr-3">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">
        Estado
    </p>
    <label class="mr-3">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label class="mr-3">
        {!! Form::radio('status', 2,) !!}
        Publicado
    </label>

    @error('status')
        <br>
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="row mb-4">
    <div class="col">
        <div class="image-grapper">
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2024/01/08/15/54/defile-8495836_1280.jpg" alt="">       
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen para tu post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente numquam molestiae accusamus consequatur nulla blanditiis incidunt, explicabo eos libero repudiandae maxime mollitia veniam maiores architecto molestias repellat assumenda? Cupiditate, natus.</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el extract del post']) !!}

    @error('extract')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el cuerpo del post']) !!}

    @error('body')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>