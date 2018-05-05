@extends('layout')


@section('content')
  <div class="row">
    <div class="col-lg-12 ">
      <form class="" action="{{route('todo.save',['id' => $todo->id])}}" method="post">
        {{csrf_field() }}
        <input type="text" name="todo" class="form-control input-lg" placeholder="Create New Todo" value="{{$todo->todo}}">
      </form>

    </div>
  </div>

@stop
