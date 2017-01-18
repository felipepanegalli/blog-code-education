@extends('template')

@section('title')
    Admin :: Adicionar novo Post
@endsection

@section('content')
    <h1>Admin :: Adicionar novo Post</h1>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route'=>'admin.posts.store', 'method'=>'post']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags:', ['class' => 'control-label']) !!}
        {!! Form::textarea('tags', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Salvar Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection