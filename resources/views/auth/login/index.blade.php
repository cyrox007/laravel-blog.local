@extends("auth.index")
@section("content")
<form action="" method="post">
    <h1>Sign In</h1>
    @csrf
    @method("POST")
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="email" name="email" id="email" placeholder="Email"
        class="@error('email') is-invalid @else is-valid @enderror" required>

    <input type="password" name="password" id="password" placeholder="Password" required>

    <button type="submit">Enter</button>
</form>
@endsection