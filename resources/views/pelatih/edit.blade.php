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
        <h1>Edit Pelatih</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pelatih.index') }}">Home</a></li>
                <li class="breadcrumb-item">Pelatih</li>
                <li class="breadcrumb-item active">Edit Pelatih</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Edit Pelatih</h5>

                        <!-- Form edit pelatih -->
                        <form action="{{ route('pelatih.update', $pelatih->id_pelatih) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelatih->nama }}" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $pelatih->email }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telpon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon" value="{{ $pelatih->nomor_telpon }}" required>
                                @error('nomor_telpon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required>{{ $pelatih->alamat }}</textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keahlian" class="form-label">Keahlian</label>
                                <input type="text" class="form-control" id="keahlian" name="keahlian" value="{{ $pelatih->keahlian }}" required>
                                @error('keahlian')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pengalaman" class="form-label">Pengalaman</label>
                                <textarea class="form-control" id="pengalaman" name="pengalaman" required>{{ $pelatih->pengalaman }}</textarea>
                                @error('pengalaman')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ $pelatih->tanggal_bergabung }}" required>
                                @error('tanggal_bergabung')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                             <!-- ID User -->
                             <div class="mb-3">
                                <label for="id_user" class="form-label">ID User</label>
                                <select class="form-control" id="id_user" name="id_user" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $pelatih->id_user == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} (ID: {{ $user->id }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>                            
                                <!-- Submit and Cancel Buttons -->
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('pelatih.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        <!-- End Form edit pelatih -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

</body>
