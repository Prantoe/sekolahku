@extends('layouts.app')

@section('title', 'Users')

@section('users-content')
    <h3 class="text-center my-4">Data Users</h3>
    <hr>
    <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">Add User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col" style="width: 20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">Show</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No users available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
