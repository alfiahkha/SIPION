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
        <h1>Edit Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Home</a></li>
                <li class="breadcrumb-item">Siswa</li>
                <li class="breadcrumb-item active">Edit Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Edit Siswa</h5>

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

                        <!-- Form edit siswa -->
                        <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $siswa->nomor_telepon }}">
                                @error('nomor_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat">{{ $siswa->alamat }}</textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ $siswa->pendidikan_terakhir }}">
                                @error('pendidikan_terakhir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status_siswa" class="form-label">Status Siswa</label>
                                <select class="form-select" id="status_siswa" name="status_siswa">
                                    <option value="aktif" {{ $siswa->status_siswa == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="tidak" {{ $siswa->status_siswa == 'tidak' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status_siswa')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        <!-- End Form edit siswa -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

</body>
