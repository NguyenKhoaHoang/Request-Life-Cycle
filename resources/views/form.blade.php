{{-- Hiển thị hết tất cả các lỗi --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@error('msg')
    {{ $error }}
@enderror

<form action="{{ route('store.store') }}" method="POST">
    @csrf
    <div>
        <input class="@error('username') is-invalid @enderror type="text" name="username" placeholder="nhap user name..." value="{{ old('username') }}">
        {{-- Hiển thị từng lỗi tương ứng --}}
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <input class="@error('password') is-invalid @enderror type="text" name="password" placeholder="Nhap mat khau..." value="{{ old('password') }}">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Submit add</button>
</form>

<form action="{{ route('store.edit') }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <input type="text" name="username" placeholder="nhap user name...">

    </div>
    <button type="submit">Submit edit</button>
</form>

<form action="{{ route('store.delete') }}" method="POST">
    @csrf
    @method('DELETE')
    <div>
        <input type="text" name="username" placeholder="nhap user name...">

    </div>
    <button type="submit">Submit delete</button>
</form>