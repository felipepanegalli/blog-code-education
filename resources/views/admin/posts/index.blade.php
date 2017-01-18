@extends('template')

@section('title')
    Blog :: Admin
@endsection

@section('content')
    <h1>Blog :: Admin</h1>



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
                <button type="button" class="btn btn-warning">Editar</button>
                <button type="button" class="btn btn-danger">Excluir</button>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    <div class="text-center">
        {!! $posts->render() !!}
    </div>


@endsection