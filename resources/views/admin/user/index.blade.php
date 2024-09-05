@extends('layouts.backend.backend')

@section('content')
<h3 class="mb-0 text-uppercase pb-3">DAFTAR USER</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('user.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Daftar User</a>
        <table class="table mb-0" id="example">
            <thead class="table">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($user as $index => $data) --}}
                {{-- @if ($data->is_admin == '0') --}}
                @foreach ($user as $data)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data ->is_admin ? 'User' : 'Admin'}}</td>
                    <td>
                        <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('user.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>
                            <button type="submit" class="btn btn-danger px-5" onclick="return confirm('Apakah anda yakin??')">Hapus</button>
                        </form>
                    </td>
                </tr>
                {{-- @endif --}}
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
