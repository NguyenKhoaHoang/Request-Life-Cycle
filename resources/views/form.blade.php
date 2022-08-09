<form action="{{ route('store.store') }}" method="POST">
    @csrf
    <div>
        <input type="text" name="username" placeholder="nhap user name...">

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