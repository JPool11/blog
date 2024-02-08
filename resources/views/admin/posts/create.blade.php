@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Crear posts</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

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
                            <img id="picture" src="https://cdn.pixabay.com/photo/2024/01/08/15/54/defile-8495836_1280.jpg" alt="">
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

                {!! Form::submit('Crear post', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-grapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-grapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        // Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload= (event)=>{
                document.getElementById("picture").setAttribute('src', event.target.result)
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection