<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @isset($title)
        {{ $title }}
        {{ $number }}
    @endisset

    <h1>This is a home page</h1>
    <a href="{{ route('add') }}">Store page</a>
    <br>
    {{-- truyen tham so vao route --}}
    <a href="{{ route('admin.news', ['id' => 257, 'slug' => 'tin-tuc-moi']) }}">News</a>
    <br>
    <a href="{{ route('demoResponse') }}">Demo response</a>
    <br>
    <a href="{{ route('demoResponse.2') }}">Demo response 2</a>
</body>

</html>
