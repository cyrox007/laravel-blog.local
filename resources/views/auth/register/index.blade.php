@extends("auth.index")

@section("title")
    Registration
@endsection

@section("content")
<form action="" method="post">
    <h1>Sign Up</h1>
    @csrf
    @method("POST")
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="text" name="name" id="name" placeholder="Name">
    <input type="password" name="password" id="password" placeholder="Password">
    <button type="submit">Registration</button>
</form>
@endsection