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
        <h1>Data Kursus</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Header card for Kursus Table and button -->
                        <div>
                            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                                <h1 class="card-title fw-bold fs-2 mb-0">Table Kursus</h1>
                                <p class="mb-0">Kursus Table Details</p>
                                <hr style="width: 100%; height: 2px; background-color: #d3d3d3; border: none; margin-top: 10px;">
                            </div>
                            <div>
                                <!-- Button to add new kursus -->
                                <a href="{{ route('kursus.create') }}" class="btn btn-primary text-center">Tambah Kursus</a>
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
    
                        <!-- Kursus List Table -->
                        <h5 class="card-title mt-4">List Data Kursus</h5>
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kursus</th>
                                    <th>Deskripsi</th>
                                    <th>Durasi (Jam)</th>
                                    <th>Harga (IDR)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kursus as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kursus }}</td>
                                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                        <td>{{ $item->durasi }}</td>
                                        <td>{{ number_format($item->harga, 2) }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('kursus.edit', $item->id_kursus) }}" class="btn btn-primary">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            
                                            <!-- Delete Button to trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_kursus }}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                   <!-- Modal for Delete Confirmation -->
                                    <div class="modal fade" id="deleteModal{{ $item->id_kursus }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id_kursus }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $item->id_kursus }}">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Apakah anda yakin akan menghapus <strong>{{ $item->nama_kursus }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('kursus.delete', $item->id_kursus) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
