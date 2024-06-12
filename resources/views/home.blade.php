{{-- @extends('components.layout.layout')

@section('content')
    <div class="container">
        <h2>home</h2>
        <p>welcome, {{  Auth::user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Log out </button>
        </form>
    </div>
@endsection
 --}}
@extends('components.admin.dhasboard')