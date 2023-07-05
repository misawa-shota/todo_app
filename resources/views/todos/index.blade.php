@extends('layouts.app')
@section('content')
    <article>
        <div class="container">
            <div class="my-3">
                <h2>Todo一覧</h2>
            </div>
            <div class="mb-3">
                @if (session('flash_message'))
                    <p class="text-success">{{ session('flash_message') }}</p>
                @endif
                <a class="fs-5 bg-primary text-white py-2 px-3 rounded-2 link-underline link-underline-opacity-0" href="{{ route('todos.create') }}">Todoを作成する</a>
            </div>
            <div>
                @foreach ($todos as $todo)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $todo->title }}</h3>
                            <p class="card-body">{{ $todo->body }}</p>
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    <a class="bg-primary text-white py-2 px-3 rounded-2 link-underline link-underline-opacity-0" href="{{ route('todos.show', $todo) }}">詳細を確認する</a>
                                </div>
                                <form action="{{ route('todos.destroy', $todo) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Todoを削除する</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </article>
@endsection
