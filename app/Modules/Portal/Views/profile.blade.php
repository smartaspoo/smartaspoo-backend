@extends("portal_layout.templates")
@section("content")
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .page-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            font-family: 'Roboto', sans-serif;
        }
        .content-box {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: flex-start;
        }
        .form-container {
            width: 70%;
            padding-right: 20px;
        }
        .profile-box {
            width: 30%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto;
            object-fit: cover;
        }
        .change-image {
            font-size: 14px;
            color: #333;
            cursor: pointer;
            margin-top: 20px;
        }
        .save-button {
            background-color: #E1B587;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .save-button:hover {
            background-color: #FBF7EB;
        }
        .upload-button {
            background-color: #E1B587;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .upload-button:hover {
            background-color: #FBF7EB;
        }
    </style>
    <div class="container mt-5">
        <div class="page-title">Profile Pengguna</div>
        <div class="content-box">
            <div class="form-container">
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="nomorTelepon" placeholder="Nomor Telepon">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenisKelamin">
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3 text-end">
                        <button type="button" class="save-button">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="profile-box">
                <img id="previewImage" src="{{URL::asset('/img/portal/profile.png')}}" alt="Profile Picture" class="profile-image">
                <div class="change-image">
                    <label for="uploadImage" class="upload-button">Pilih Gambar</label>
                    <input type="file" id="uploadImage" style="display: none" accept="image/*" max-size="1000000">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("uploadImage").addEventListener("change", function() {
            const fileInput = this;
            const file = fileInput.files[0];
            
            if (file && file.size <= 1000000) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById("previewImage").src = event.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                alert("Please select an image file with size up to 1MB.");
                fileInput.value = ""; // Clear the file input
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection