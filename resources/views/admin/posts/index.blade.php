@extends('template')

@section('title')
    Blog :: Admin
@endsection

@section('content')
    <h1>Blog :: Admin</h1>
    <br>
    <a href="{{ route('admin.posts.add') }}" class="btn btn-success">Novo Post</a>
    <br><br>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th class="text-center">Ações</th>
        </tr>
        </thead>

        <tbody>

        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td class="text-center">
                <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('admin.posts.del', ['id'=>$post->id]) }}" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    <div class="text-center">
        {!! $posts->render() !!}
    </div>


@endsection