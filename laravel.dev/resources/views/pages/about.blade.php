@extends('myapp')

  @section('content')
    <h1>About Me </h1>
    <p>Some content here</p>

    @if(count($people))
    <h3>People</h3>
    <ul>
      @foreach ($people as $person)
      <li>{{  $person }}</li>
      @endforeach
    </ul>
    @endif
  @stop

  @section('footer')
    <h2>Footer About</h2>
  @stop
