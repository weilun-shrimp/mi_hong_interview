
@extends('layout')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-1">
            @if (Auth::user()->role === 'admin')
                <button type="button" class="btn btn-primary" style="cursor:pointer;" onclick="(new bootstrap.Modal(`#user_modal_`)).show()">
                    <i class="bi bi-plus-square"></i>
                </button>
                @include('user.form_modal', ['user' => null])
            @endif
        </div>

        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger my-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        @if (Auth::user()->role === 'admin')
                            <th scope="col">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="align-middle">{{ $user->id }}</th>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $user->role }}</td>
                        @if (Auth::user()->role === 'admin')
                            <td class="align-middle">
                                <button type="button" class="btn btn-outline-primary" style="cursor:pointer;" onclick="(new bootstrap.Modal(`#user_modal_{{ $user->id }}`)).show()">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                @include('user.form_modal', ['user' => $user])
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
