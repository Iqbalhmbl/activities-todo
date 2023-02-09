@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-3">
        <a href="{{ route('todo.create') }}" class="btn btn-sm btn-primary">Add Todo</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Activities</th>
            <th scope="col">Title</th>
            <th scope="col">Priority</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($todo as $t)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $t->title_act }}</td>
                <td>{{ $t->title }}</td>
                <td>{{ $t->priority }}</td>
                <td>
                    <a href="{{ route('todo.edit', $t->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
                    <a href="{{ route('todo.destroy', $t->id) }}" class="btn btn-sm btn-danger"  onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="fa fa-trash"></i>Delete</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
