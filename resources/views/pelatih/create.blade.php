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
        <h1>Tambah Pelatih</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Formulir Tambah Pelatih</h5>

                        <!-- Tampilkan pesan error validasi jika ada -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- End pesan error validasi -->

                        <!-- Form tambah pelatih -->
                        <form action="{{ route('pelatih.store') }}" method="POST">
                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="mb-3">
                                <label for="nomor_telpon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon" required>
                                @error('nomor_telpon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Keahlian -->
                            <div class="mb-3">
                                <label for="keahlian" class="form-label">Keahlian</label>
                                <input type="text" class="form-control" id="keahlian" name="keahlian" required>
                                @error('keahlian')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Pengalaman -->
                            <div class="mb-3">
                                <label for="pengalaman" class="form-label">Pengalaman</label>
                                <textarea class="form-control" id="pengalaman" name="pengalaman" required></textarea>
                                @error('pengalaman')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tanggal Bergabung -->
                            <div class="mb-3">
                                <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
                                @error('tanggal_bergabung')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tombol Simpan dan Batal -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pelatih.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        <!-- End Form tambah pelatih -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

@section('scripts')
<script>
    $(document).ready(function() {
        // Data users dari controller Laravel
        let users = @json($users);

        // Buat array nama dan email untuk Typeahead
        let namaList = users.map(user => user.name);
        let emailList = users.map(user => user.email);

        // Inisialisasi Typeahead untuk Nama
        $('#nama').typeahead({
            source: namaList,
            autoSelect: true
        });

        // Inisialisasi Typeahead untuk Email
        $('#email').typeahead({
            source: emailList,
            autoSelect: true
        });
    });
</script>
@endsection

</body>
