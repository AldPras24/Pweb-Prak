<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Aplikasi Tracer Alumni</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h4>Tambah Data Alumni</h4>
            <form id="alumniForm">
                <div class="mb-2">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="major" class="form-label">Jurusan</label>
                    <input type="text" id="major" name="major" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="year" class="form-label">Angkatan</label>
                    <input type="number" id="year" name="year" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Daftar Alumni</h4>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="alumniData">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function loadAlumni() {
        $.get('process.php', { action: 'read' }, function(data) {
            $('#alumniData').html(data);
        });
    }
    $(document).ready(function() {
        loadAlumni();
        $('#alumniForm').submit(function(e) {
            e.preventDefault();
            $.post('process.php', $(this).serialize() + '&action=create', function() {
                alert('Data berhasil ditambahkan!');
                loadAlumni();
                $('#alumniForm')[0].reset();
            });
        });
        $(document).on('click', '.deleteBtn', function() {
            if (confirm('Yakin ingin menghapus data ini?')) {
                let index = $(this).data('index');
                $.post('process.php', { action: 'delete', index: index }, function() {
                    alert('Data berhasil dihapus!');
                    loadAlumni();
                });
            }
        });
    });
</script>
</body>
</html>
