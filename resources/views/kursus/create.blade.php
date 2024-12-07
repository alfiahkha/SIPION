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
        <h1>Tambah Kursus</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Formulir Tambah Kursus</h5>

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

                        <!-- Form tambah kursus -->
                        <form action="{{ route('kursus.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kursus" class="form-label">Nama Kursus</label>
                                <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" required>
                                @error('nama_kursus')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                @error('deskripsi')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi (Jam)</label>
                                <input type="number" class="form-control" id="durasi" name="durasi" required>
                                @error('durasi')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga (IDR)</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                                @error('harga')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('kursus.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        <!-- End Form tambah kursus -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

</body>
