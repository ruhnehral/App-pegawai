<!DOCTYPE html>
<html>
<head>
    <title>Form Input Pegawai</title>
</head>
<body>
    <h1>Form Pegawai</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <table>
            <tr><td>Nama Lengkap</td><td><input type="text" name="nama_lengkap"></td></tr>
            <tr><td>Email</td><td><input type="email" name="email"></td></tr>
            <tr><td>Nomor Telepon</td><td><input type="text" name="nomor_telepon"></td></tr>
            <tr><td>Tanggal Lahir</td><td><input type="date" name="tanggal_lahir"></td></tr>
            <tr><td>Alamat</td><td><textarea name="alamat"></textarea></td></tr>
            <tr><td>Tanggal Masuk</td><td><input type="date" name="tanggal_masuk"></td></tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><button type="submit">Simpan</button></td></tr>
        </table>
    </form>
</body>
</html>
