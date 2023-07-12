@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Account Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>NIP:</strong> {{ $user->nip }}</li>
                        <li class="list-group-item"><strong>Role:</strong> {{ $user->roles->first()->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Account Settings</h5>
                    <form action="{{ route('account.email.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="email" class="form-label">Change Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Email</button>
                    </form>
                    <!-- <h5 class="card-title">Change Password</h5>
                    <form action="{{ route('account.password.edit') }}" method="GET">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form> -->
                    <br>
                    <form action="{{ route('account.password.edit') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Change Password</label>
                            <input class="form-control" value="*********" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>

                <!-- <h5 class="card-title">Account Settings</h5>
                    <form action="{{ route('account.email.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="email" class="form-label">Change Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Email</button>
                    </form> -->

                <!-- <form action="{{ route('account.password.edit') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Change Password</label>
                            <input class="form-control" value="*********" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form> -->

            </div>
        </div>
        <!-- <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Change Password</h5>
                    <form action="{{ route('account.password.edit') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Password</button>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection