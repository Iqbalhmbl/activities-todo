@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-3">
        <a href="{{ route('act.create') }}" class="btn btn-sm btn-primary">Add Activities</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($act as $a)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $a->title }}</td>
                <td>{{ $a->email }}</td>
                <td>
                    <a href="{{ route('act.edit', $a->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
                    <a href="{{ route('act.destroy', $a->id) }}" class="btn btn-sm btn-danger"  onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="fa fa-trash"></i>Delete</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
