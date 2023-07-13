@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Account Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Password:</strong> *********</li>
                        <li class="list-group-item"><strong>NIP:</strong> {{ $user->nip }}</li>
                    </ul>
                    <div class="mt-3">
                        <a href="{{ route('profile') }}" class="btn btn-primary">Edit
                            Account</a>
                        <a href="{{ route('account.password.edit') }}" class="btn btn-primary">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection