@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Details</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <p>{{ $user->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Created At:</label>
                        <p>{{ $user->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Updated:</label>
                        <p>{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary me-md-2">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ms-md-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
