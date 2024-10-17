@extends('templates.app', ['title' => 'Landing || Login'])

@section('search')
<form class="d-flex" role="search" action="{{ route('user') }}" method="GET">
    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection

@section('content-dinamis')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>User Management</h2>
        <a href="{{ route('login.add') }}" class="btn btn-outline-success shadow-sm">
            Login <i class="bi bi-person-plus-fill"></i>
        </a>
    </div>

    @if (Session::get('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @php $number = 1; @endphp
        @foreach ($users as $index => $user)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <p class="card-text"><small class="text-muted">No: {{ $users->firstItem() + $index }}</small></p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-primary btn-sm me-2 shadow-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('users.delete', $user['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                    <i class="bi bi-person-dash-fill"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $users->links() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="form-delete-user" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus user "<span id="nama-user"></span>" ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-danger" id="btn-delete">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz4fnFO9gybL8R+MjtCqY1hFJ5mZi6HXofA+SA9F4YrPaZsF5WJpPca5lFf"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93aFyWdAnmB9M/z+DQpten47URy7AAQ+eA7iLEHoBSAI5COvI5qJfM0Y26l5AN"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function showModal(id, name) {
        let action = '{{ route('users.delete', ':id') }}';
        action = action.replace(':id', id);
        $('#form-delete-user').attr('action', action);
        $('#exampleModal').modal('show');
        $('#nama-user').text(name);
    }
</script>
@endpush
@endsection