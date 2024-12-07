@include('themes.head')
<body>

<!-- ======= Header ======= -->
@include('themes.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('themes.sidemenu')
<!-- End Sidebar -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Header card for Users Table and button -->
                        <div>
                            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                                <h1 class="card-title fw-bold fs-2 mb-0">Table Users</h1>
                                <p class="mb-0">Detail Tabel Users</p>
                                <hr style="width: 100%; height: 2px; background-color: #d3d3d3; border: none; margin-top: 10px;">
                            </div>
                            <div>
                                <!-- Button to add new user -->
                                <a href="{{ route('users.create') }}" class="btn btn-primary text-center">Tambah User</a>
                            </div>
                        </div>

                        <!-- Display error validation messages if any -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <!-- Display success message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- User List Table -->
                        <h5 class="card-title mt-4">List Data User</h5>
                        <table class="table table-striped datatable table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 15%;">Nama</th>
                                    <th style="width: 15%;">Email</th>
                                    <th style="width: 15%;">Nomor Telepon</th>
                                    <th style="width: 15%;">Alamat</th>
                                    <th style="width: 10%;">Tanggal Bergabung</th>
                                    <th style="width: 5%;">ID User</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->nomor_telepon }}</td> <!-- Optional field for phone number -->
                                        <td>{{ $user->alamat }}</td> <!-- Optional field for address -->
                                        <td>{{ \Carbon\Carbon::parse($user->tanggal_bergabung)->format('Y-m-d') }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            
                                            <!-- Delete Button to trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Delete Confirmation -->
                                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $user->id }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus user: <strong>{{ $user->name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End of Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

<!-- Bootstrap JS (necessary for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
