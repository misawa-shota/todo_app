<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo_app</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <h1><a href="{{ route('todos.index') }}">Todo_app</a></h1>
            </div>
        </nav>
    </header>

    <main>
        <article>
            <div>
                <h2>Todo一覧</h2>
            </div>
            <div>
                @if (session('flash_message'))
                    <p>{{ session('flash_message') }}</p>
                @endif
                <a href="{{ route('todos.create') }}">Todoを作成する</a>
            </div>
            <div>
                @foreach ($todos as $todo)
                    <div>
                        <h3>{{ $todo->title }}</h3>
                        <p>{{ $todo->body }}</p>
                        <a href="{{ route('todos.show', $todo) }}">詳細を確認する</a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Todoを削除する</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </article>
    </main>

    <footer>
        <p>&copy; Todo_app All rights reserved.</p>
    </footer>
</body>
</html>
