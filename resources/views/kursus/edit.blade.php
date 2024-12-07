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
        <h1>Edit Kursus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('kursus.index') }}">Home</a></li>
                <li class="breadcrumb-item">Kursus</li>
                <li class="breadcrumb-item active">Edit Kursus</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Edit Kursus</h5>

                        <!-- Form edit kursus -->
                        <form action="{{ route('kursus.update', $kursus->id_kursus) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_kursus" class="form-label">Nama Kursus</label>
                                <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" value="{{ $kursus->nama_kursus }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $kursus->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi (jam)</label>
                                <input type="number" class="form-control" id="durasi" name="durasi" value="{{ $kursus->durasi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="{{ $kursus->harga }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('kursus.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        <!-- End Form edit kursus -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

</body>
