@extends('layouts.main')
@section('content')
    <div class="container p-5">
        <h1 class="text-center fw-bold">User List Management</h1>
        <hr class="hr" />
        <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#createModal">Add User</button>
        <div class="justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex">
                                <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{ $user->id }}"><i class="fas fa-fw fa-pencil"
                                        style="font-size: 18px;"></i></button>
                                <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm"
                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}"><i
                                        class="fas fa-fw fa-trash text-white" style="font-size: 18px;"></i></button>

                                <form action="user/{{ $user->id }}" id="form-delete-{{ $user->id }}" method="POST"
                                    style="display: none">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="" value="Delete">
                                </form>
                            </td>



                            {{--  Edit Modal  --}}
                            <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold" id="exampleModalLabel">
                                                EDIT USER
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('user/' . $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <input type="text"
                                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                                        name="name" placeholder="Name" value="{{ $user->name }}"
                                                        required autofocus>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="email"
                                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                                        name="email" placeholder="Email" value="{{ $user->email }}"
                                                        required>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                                        name="password" placeholder="password"
                                                        value="{{ $user->password }}" required>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning mt-2">Edit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    {{--  Model Create  --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD USER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('user') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                name="name" placeholder="Name" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <input type="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success ">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
