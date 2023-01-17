@extends("core.base")
@section("content")
    <section id="post-create">
        <div class="container">
            <form action="" method="post">
                @csrf
                @method('POST')
                <label for="title">
                    Title
                    <input type="text" name="title" id="title" required>
                </label>
                <label for="text">
                    Text
                    <textarea name="text" id="text" cols="30" rows="10"></textarea>
                </label>
                <button type="submit">Create</button>
            </form>
        </div>
    </section>
@endsection