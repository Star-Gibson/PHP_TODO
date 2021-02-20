@extends('layouts.app')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
  <div class="card" style="width: 40%">
    <div class="card-body">
      <div class="card-title" style="font-size: x-large">
        Edit Todo: <span style="font-size: large">{{ $todo->title }} </span>
      </div>
      <form action="{{ route('todo.update', $todo->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="title" placeholder="{{ $todo->title }}">
        </div>
        <div class="form-group">
          <label for="created">Created At:</label>
          <input type="text" class="form-control" value="{{ $todo->created_at->format('m-d-Y | H:i') }}" readonly>
        </div>
        <div class="form-group">
          <label for="updated">Last Updated At:</label>
          <input type="text" class="form-control" value="{{ $todo->updated_at->format('m-d-Y | H:i') }}" readonly>
        </div>
        @if($todo->completed === 0)
        <div class="form-group">
          <label for="status">Status:</label>
          <input type="text" class="form-control" value="Incomplete" readonly>
        </div>
        @else
        <div class="form-group">
          <label for="status">Status:</label>
          <input type="text" class="form-control" value="Completed" readonly>
        </div>
        @endif
        <button class="btn btn-dark" type="submit">
          Save
        </button>
      </form>
    </div>
  </div>
</div>

@endsection


<!-- PRIORITIES (WILL ADD TO FORM UPON IMPLEMENTATION AND COMPLETION OF PRIRORITIES) -->
<!-- <div class="form-group">
<label for="formGroupExampleInput2">Priorities</label>
<input type="text" class="form-control>
</div> -->