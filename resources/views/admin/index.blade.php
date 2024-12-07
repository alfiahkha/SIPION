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

    <!-- Bagian section utama yang menampilkan tabel data admin -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Bagian Header Card untuk Tabel Admin dan Tombol Tambah -->
                        <div>
                            <!-- Judul tabel dan deskripsi -->
                            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                                <h1 class="card-title fw-bold fs-2 mb-0">Table Admin</h1>
                                <p class="mb-0">Detail Tabel Admin</p>
                                <hr style="width: 100%; height: 2px; background-color: #d3d3d3; border: none; margin-top: 10px;">
                            </div>

                            <!-- Tombol untuk menambah admin baru -->
                            <div>
                                <a href="{{ route('admins.create') }}" class="btn btn-primary text-center">Tambah Admin</a>
                            </div>
                        </div>

                        <!-- Menampilkan pesan kesalahan validasi jika ada -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li> <!-- Menampilkan pesan kesalahan validasi -->
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Menampilkan pesan sukses jika ada -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }} <!-- Menampilkan pesan sukses dari session -->
                            </div>
                        @endif

                        <!-- Bagian Tabel Daftar Admin -->
                        <h5 class="card-title mt-4">List Data Admin</h5>
                        <table class="table table-striped datatable table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th> <!-- Kolom nomor urut -->
                                    <th style="width: 15%;">Nama</th> <!-- Kolom nama admin -->
                                    <th style="width: 15%;">Email</th> <!-- Kolom email admin -->
                                    <th style="width: 15%;">Nomor Telepon</th> <!-- Kolom nomor telepon admin -->
                                    <th style="width: 15%;">Alamat</th> <!-- Kolom alamat admin -->
                                    <th style="width: 10%;">Tanggal Bergabung</th> <!-- Kolom tanggal bergabung -->
                                    <th style="width: 5%;">ID User</th> <!-- Kolom ID user terkait -->
                                    <th style="width: 10%;">Aksi</th> <!-- Kolom aksi untuk edit atau hapus -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <!-- Menampilkan data admin berdasarkan loop -->
                                        <td>{{ $loop->iteration }}</td> <!-- Menampilkan nomor urut -->
                                        <td>{{ $admin->nama }}</td> <!-- Menampilkan nama admin -->
                                        <td>{{ $admin->email }}</td> <!-- Menampilkan email admin -->
                                        <td>{{ $admin->nomor_telepon }}</td> <!-- Menampilkan nomor telepon admin -->
                                        <td>{{ $admin->alamat }}</td> <!-- Menampilkan alamat admin -->
                                        <td>{{ \Carbon\Carbon::parse($admin->tanggal_bergabung)->format('Y-m-d') }}</td> <!-- Menampilkan tanggal bergabung admin -->
                                        <td>{{ $admin->id_user }}</td> <!-- Menampilkan ID user terkait admin -->
                                        <td>
                                            <!-- Tombol untuk mengedit admin -->
                                            <a href="{{ route('admins.edit', $admin->id_admin) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            
                                            <!-- Tombol untuk memicu modal konfirmasi hapus -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $admin->id_admin }}">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal untuk konfirmasi penghapusan admin -->
                                    <div class="modal fade" id="deleteModal{{ $admin->id_admin }}" tabindex="-1" aria-labelledby="modalLabel{{ $admin->id_admin }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Bagian header modal -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $admin->id_admin }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Bagian body modal -->
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus admin: <strong>{{ $admin->nama }}</strong>? <!-- Pesan konfirmasi -->
                                                </div>
                                                <!-- Bagian footer modal -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> <!-- Tombol batal -->
                                                    <form action="{{ route('admins.delete', $admin->id_admin) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button> <!-- Tombol hapus -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Akhir dari Tabel -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer') 

<!-- Bootstrap JS (diperlukan untuk fungsionalitas modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
