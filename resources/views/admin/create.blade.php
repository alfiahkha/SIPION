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
        <h1>Tambah Admin</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Formulir Tambah Admin</h5>

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

                        <!-- Form tambah admin -->
                        <form action="{{ route('admin.store') }}" method="POST">
                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" required>
                                @error('nomor_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required></textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tanggal Bergabung -->
                            <div class="mb-3">
                                <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                                <input type="date" class="form-control @error('tanggal_bergabung') is-invalid @enderror" id="tanggal_bergabung" name="tanggal_bergabung" required>
                                @error('tanggal_bergabung')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- ID User -->
                            {{-- 
                            <div class="mb-3">
                                <label for="id_user" class="form-label">ID User</label>
                                <select class="form-control @error('id_user') is-invalid @enderror" id="id_user" name="id_user" required>
                                    <option value="">-- Pilih ID User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }}</option>
                                    @endforeach
                                </select>
                                @error('id_user')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            --}}

                            <!-- Tombol Simpan dan Batal -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        <!-- End Form tambah admin -->

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
