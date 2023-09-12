<div class="modal fade" id="user_modal_{{ $user ? $user->id : '' }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $user ? 'Edit' : 'Create' }} User {{ $user ? $user->id : '' }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $user ? route('user.update', ['id' => $user->id]) : route('user.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="{{ $user ? 'PUT' : 'POST' }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="user_modal_name_{{ $user ? $user->id : '' }}" required name="name" value="{{ $user ? $user->name : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="user_modal_email_{{ $user ? $user->id : '' }}" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="user_modal_email_{{ $user ? $user->id : '' }}" required name="email" value="{{ $user ? $user->email : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="user_modal_role_{{ $user ? $user->id : '' }}" class="form-label">Role</label>
                        <select name="role" class="form-select" id="user_modal_role_{{ $user ? $user->id : '' }}" required>
                            <option value="admin" @if ($user and $user->role === 'admin') selected @endif>admin</option>
                            <option value="user" @if ($user and $user->role === 'user') selected @endif>user</option>
                        </select>
                    </div>

                    @if (!$user)
                        <div class="mb-3">
                            <label for="user_modal_password_{{ $user ? $user->id : '' }}" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user_modal_password_{{ $user ? $user->id : '' }}" required minlength="5" name="password">
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
