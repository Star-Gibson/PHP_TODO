@extends('layouts.app')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="text-center" style="width: 40%">
        <h1 class="display-4 text-white">Wolfpack Todo's</h1>
        <!-- STORE TODO IN DATABASE-->
        <form action="{{ route('todo.store') }}" method="POST">
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
        <div class="pb-2">
            <button class='btn btn-dark'>Sort by Status</button>
            <button class='btn btn-dark'>Sort by Priority</button>
        </div>
        <div class="bg-white">
            @foreach($todos as $todo)
            <div class="w-100 d-flex align-items-center justify-content-between">
                <div class='p-2'>
                    @if($todo->completed === 0)
                    <!-- ICON (TODO IN PROGRESS) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                    </svg>
                    @else
                    <!-- ICON (TODO COMPLETED) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <path d="M9 12l2 2l4 -4" />
                    </svg>
                    @endif
                    {{ $todo->title }}
                </div>
                <div class="mr=2 d-flex align-items-center">
                    @if($todo->completed === 0)
                    <!-- UPDATE TODO TO COMPLETED -->
                    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" value="1" name="completed" hidden>
                        <button class="btn btn-dark">Complete</button>
                    </form>
                    @else
                    <!-- UPDATE TODO TO INCOMPLETED -->
                    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" value="0" name="completed" hidden>
                        <button class="btn btn-danger">Incomplete</button>
                    </form>
                    @endif
                    <!-- EDIT TODO (TAKES USER TO NEW PAGE WHERE THEY CAN EDIT TODO) -->
                    <a href="{{ route('todo.edit', $todo->id) }}">
                        <button class="btn border-0 ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                            </svg>
                    </a>
                    <!-- DELETE TODO -->
                    <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection