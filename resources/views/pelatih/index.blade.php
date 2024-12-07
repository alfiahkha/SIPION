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
                        <!-- Header card for Pelatih Table and button -->
                        <div>
                            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                                <h1 class="card-title fw-bold fs-2 mb-0">Table Pelatih</h1>
                                <p class="mb-0">Detail Tabel Pelatih</p>
                                <hr style="width: 100%; height: 2px; background-color: #d3d3d3; border: none; margin-top: 10px;">
                            </div>
                            <div>
                                <!-- Button to add new pelatih -->
                                <a href="{{ route('pelatih.create') }}" class="btn btn-primary text-center">Tambah Pelatih</a>
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
    
                        <!-- Pelatih List Table -->
                        <h5 class="card-title mt-4">List Data Pelatih</h5>
                        <table class="table table-striped datatable table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 15%;">Nama</th>
                                    <th style="width: 15%;">Email</th>
                                    <th style="width: 15%;">Nomor Telepon</th>
                                    <th style="width: 15%;">Alamat</th>
                                    <th style="width: 10%;">Keahlian</th>
                                    <th style="width: 10%;">Pengalaman</th>
                                    <th style="width: 10%;">Tanggal Bergabung</th>
                                    <th style="width: 5%;">ID User</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelatih as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->nomor_telpon }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->keahlian }}</td>
                                        <td>{{ $p->pengalaman }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->tanggal_bergabung)->format('Y-m-d') }}</td> <!-- Format date without time -->
                                        <td>{{ $p->id_user }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('pelatih.edit', $p->id_pelatih) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            
                                            <!-- Delete Button to trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $p->id_pelatih }}">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Delete Confirmation -->
                                    <div class="modal fade" id="deleteModal{{ $p->id_pelatih }}" tabindex="-1" aria-labelledby="modalLabel{{ $p->id_pelatih }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $p->id_pelatih }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin akan menghapus <strong>{{ $p->nama }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('pelatih.delete', $p->id_pelatih) }}" method="POST" style="display:inline;">
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
