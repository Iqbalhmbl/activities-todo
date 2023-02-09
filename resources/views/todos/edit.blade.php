@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-3">
        <a href="{{ route('todo.index') }}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('todo.update', $todo->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="activity_group_id" class="form-label">Activity</label>
                    <select name="activity_group_id" class="form-control" id="activity_group_id">
                        @foreach ($act as $a)
                        <option value="{{ $a->id }}" @if($todo->activity_group_id == $a->id) selected @endif>{{ $a->title }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $todo->title }}" name="title" id="title">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Priority</label>
                  <input type="priority" value="{{ $todo->priority }}" name="priority" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

</div>
@endsection
