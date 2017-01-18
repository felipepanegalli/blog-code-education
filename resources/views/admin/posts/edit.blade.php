@extends('template')

@section('title')
    Admin :: Editar Post :: {{$post->title}}
@endsection

@section('content')
    <h1>Admin :: Editar Post :: {{$post->title}}</h1>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags:', ['class' => 'control-label']) !!}
        {!! Form::textarea('tags', $post->tagList, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Salvar Alterações', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection