@extends('layout')

@section('content')
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form class="" action="/create/todo" method="post">
        {{csrf_field() }}
        <input type="text" name="todo" class="form-control input-lg" placeholder="Create New Todo" value="">
      </form>

    </div>
  </div>
  @foreach($todos as $todo)
    {{$todo->todo}} <a href="{{route('todo.delete',['id' => $todo->id])}}" class="btn btn-danger">X</a>
    <a href="{{route('todo.update',['id' => $todo->id])}}" class="btn btn-info btn-xs">update</a>
    @if (!$todo->completed)
      <a href="{{route('todo.complete',['id' => $todo->id])}}" class="btn btn-xs btn-success"> tandai selesai</a>
    @else
      Selesai
    @endif

    <hr>
  @endforeach
@stop
