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
        <h1>Edit Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Edit Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Edit Admin</h5>
                        <!-- Form edit user -->
                        <form action="{{ route('admin.update', $admin->id_admin) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $admin->nama }}" required>
                            </div>
                        
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                            </div>
                        
                            <!-- Nomor Telepon -->
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $admin->nomor_telepon }}" required>
                            </div>
                        
                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required>{{ $admin->alamat }}</textarea>
                            </div>
                        
                            <!-- Tanggal Bergabung -->
                            <div class="mb-3">
                                <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ $admin->tanggal_bergabung }}" required>
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
                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        
                        <!-- End Form edit user -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('themes.footer')

</body>
