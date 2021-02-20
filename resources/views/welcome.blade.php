@extends('layouts.app')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="text-center" style="width: 40%">
        <h1 class="display-4 text-white">Wolfpack Todo's</h1>
        <!-- SAVING INPUT INTO DATABASE -->
        <form action="{{route('todo.store')}}" method="POST">
            <!-- MUST VERIFY CSRF TOKEN FOR FORM TO FUNCTION PROPERLY -->
            @csrf
            <div class="input-group mb-3 w-100">
                <input type="text" class="form-control form-control-lg" name="title" placeholder="What do you need todo?">
                <div class="input-group-append">
                    <!-- CHANGE BUTTON TO PLUS SIGN -->
                    <button class="btn btn-danger" type="submit" id="button-addon2">Add</button>
                </div>
            </div>
        </form>
        <h2 class="text-white pt-4">My Todo List:</h2>
        <div class="bg-white">
            @foreach($todos as $todo)
            <div class="w-100 d-flex align-items-center justify-content-between">
                <div class='p-2'>
                    @if($todo->completed === 0)
                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <path d="M10 10l4 4m0 -4l-4 4" />
                    </svg>
                    @else
                    <!-- ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <path d="M9 12l2 2l4 -4" />
                    </svg>
                    @endif
                    {{$todo->title}}
                </div>
                <div class="mr-2 d-flex align-items-center">
                    @if($todo->completed === 0)
                    <form action="{{route('todo.update', $todo->id)}}" method="POST">
                        <!-- ALLOWS FORM TO USE PUT METHOD -->
                        @method('PUT')
                        @csrf
                        <input type="text" value="1" name="completed" hidden>
                        <button class="btn btn-success">Complete</button>
                    </form>
                    @else
                    <form action="{{route('todo.update', $todo->id)}}" method="POST">
                        <!-- ALLOWS FORM TO USE PUT METHOD -->
                        @method('PUT')
                        @csrf
                        <input type="text" value="0" name="completed" hidden>
                        <button class="btn btn-danger">Incomplete</button>
                    </form>
                    @endif
                    <form action="{{route('todo.destroy', $todo->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">DELETE</button>
                    <!-- DESTROY -->
                    </form>


                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection