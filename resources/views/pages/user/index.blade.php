@extends('layouts.app')

@section('title', 'User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>
            </div>
            <div class="section-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h2 class="section-title">User</h2>
                <p class="section-lead">Anda bisa mengelola semua user, seperti mengubah, menghapus dan yang lainnya.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="section-header-button pl-4 pt-4">
                                <a href="{{ route('user.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Tambah User
                                </a>
                            </div>
                            <div class="card-header">
                                <h4>Data User</h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group d-flex align-items-center">
                                            <input type="text" name="name_search" class="form-control"
                                                placeholder="Cari User" value="{{ old('search_name') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-icon btn-primary py-2">
                                                    <i class="fas fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-sm table-hover table-striped table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Dibuat Pada</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        {{ $users->firstItem() + $loop->index }}</td>
                                                    <td class="align-middle">{{ $user->name }}</td>
                                                    <td class="align-middle">{{ $user->email }}</td>
                                                    <td class="align-middle">{{ $user->phone }}</td>
                                                    <td class="align-middle">{{ $user->role }}</td>
                                                    <td class="align-middle">{{ $user->created_at }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-outline-dark btn-icon">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="" data-toggle="modal"
                                                            onclick="deleteUser('{{ $user->id }}')"
                                                            class="btn btn-outline-danger btn-icon">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right float-right">
                                {{ $users->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- Confirm Delete Modal --}}
<div class="modal fade" tabindex="-1" role="dialog" id="deleteUserModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Hapus data user dari database?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <form action="{{ route('user.destroy', $user->id ?? '') }}" method="post" id="deleteUserForm">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-secondary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Confirm Delete Modal --}}

{{-- Delete User Function --}}
<script>
    function deleteUser(id) {
        $('#deleteUserModal').modal('show');
        $('#deleteUserForm').attr('action', '/user/' + id)
        $('.delete').on('click', function() {});
    }
</script>
{{-- Delete User Function --}}

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
