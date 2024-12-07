@include('themes.head')
<body>

<!-- ======= Header ======= -->
@include('themes.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('themes.sidemenu')
<!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Header card for Students Table and button -->
                        <div>
                            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                                <h1 class="card-title fw-bold fs-2 mb-0">Table Siswa</h1>
                                <p class="mb-0">Detail Tabel Siswa</p>
                                <hr style="width: 100%; height: 2px; background-color: #d3d3d3; border: none; margin-top: 10px;">
                            </div>
                            <div>
                                <!-- Button to add new student -->
                                <a href="{{ route('siswa.create') }}" class="btn btn-primary text-center">Tambah Siswa</a>
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

                        <!-- Students List Table -->
                        <h5 class="card-title mt-4">List Data Siswa</h5>
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID User</th>
                                    <th>ID Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Status Siswa</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->id_user }}</td>
                                        <td>{{ $s->id_pendaftaran }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->email }}</td>
                                        <td>{{ $s->nomor_telepon }}</td>
                                        <td>{{ $s->tanggal_lahir }}</td>
                                        <td>{{ $s->alamat }}</td>
                                        <td>{{ $s->pendidikan_terakhir }}</td>
                                        <td>{{ $s->status_siswa }}</td>
                                        <td>{{ $s->tanggal_daftar }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('siswa.edit', $s->id_siswa) }}" class="btn btn-primary">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            
                                            <!-- Delete Button to trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $s->id_siswa }}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                   <!-- Modal for Delete Confirmation -->
                                    <div class="modal fade" id="deleteModal{{ $s->id_siswa }}" tabindex="-1" aria-labelledby="modalLabel{{ $s->id_siswa }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $s->id_siswa }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Apakah Anda yakin akan menghapus <strong>{{ $s->nama }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('siswa.delete', $s->id_siswa) }}" method="POST" style="display:inline;">
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
