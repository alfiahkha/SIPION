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
        <h1>Tambah Siswa</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Formulir Tambah Siswa</h5>

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

                        <!-- Form tambah siswa -->
                        <form action="{{ route('siswa.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_user" class="form-label">ID User</label>
                                <select class="form-control" id="id_user" name="id_user" required>
                                    <option value="">-- Pilih ID User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }}</option>
                                    @endforeach
                                </select>
                                @error('id_user')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_pendaftaran" class="form-label">ID Pendaftaran</label>
                                <input type="number" class="form-control" id="id_pendaftaran" name="id_pendaftaran" required>
                                @error('id_pendaftaran')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <select class="form-control" id="nama" name="nama" required>
                                    <option value="">-- Pilih Nama --</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('nama')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <select class="form-control" id="email" name="email" required>
                                    <option value="">-- Pilih Email --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->email }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                                @error('email')
                                <small>{{ $message }}</small>
                                @enderror
                            </div>
                             <!-- Nomor Telepon -->
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                                @error('nomor_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                             <!-- Tanggal Lahir -->
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                @error('tanggal_lahir')
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
                            <!-- Pendidikan Terakhir -->
                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                @error('pendidikan_terakhir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Status Siswa -->
                            <div class="mb-3">
                                <label for="status_siswa" class="form-label">Status Siswa</label>
                                <select class="form-select" id="status_siswa" name="status_siswa" required>
                                    <option value="">Pilih Status</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak">Tidak Aktif</option>
                                </select>
                                @error('status_siswa')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Tanggal Daftar -->
                            <div class="mb-3">
                                <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                                <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar" required>
                                @error('tanggal_daftar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        <!-- End Form tambah siswa -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

</body>
