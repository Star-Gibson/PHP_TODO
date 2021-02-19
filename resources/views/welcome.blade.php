@extends('layouts.app')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="text-center" style="width: 40%">
        <h1 class="display-4 text-white">Wolfpack Todo's</h1>
        <!-- SAVING INPUT INTO DATABASE -->
        <form action="{{route('todo.store')}}" method="POST">
        <!-- MUST VERIFY CSRF TOKEN FOR FORM TO FUNCTION PROPERLY -->
        {{ csrf_field() }}
            <div class="input-group mb-3 w-100">
                <input type="text" class="form-control form-control-lg" name="title" placeholder="What do you need todo?">
                <div class="input-group-append">
                    <!-- CHANGE BUTTON TO PLUS SIGN -->
                    <button class="btn btn-danger" type="submit" id="button-addon2">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection