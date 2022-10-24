@extends('layouts.backend')


@section('content')

<h1>Create new city</h1>
<form {{$novalidate}} method="POST" action="{{ route('cities.store') }}">
<h3>Nazwa * </h3>
<input class="form-control" type="text" required name="name"><br>
<button class="btn btn-primary" type="submit">Stwórz</button>
{{csrf_field()}}
</form>

@endsection
