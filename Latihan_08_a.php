<style>
    table,td,th{
        border:1px solid #ddd;
        text-align:left;
    }
    table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 15px;
            border: 1px solid black; /* Tambahkan garis border agar tabel terlihat lebih rapi */
            text-align: center; /* Pusatkan teks di dalam tabel */
        }
        th {
            background-color: #f2f2f2; /* Warna latar untuk header tabel */
        }
    </style>
    <?php
        echo "<h2>Latihan 8a</h2>";
        echo "<hr>";
        echo "<center><b>";
        echo "FAKULTAS ILMU KOMPUTER<br>";
        echo "UNIVERSITAS KUNINGAN<br>";
        print "DAFTAR ALUMNI ANGKATAN 2020<br><br>";
        print "</b></center>";
        print"
            <table>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Program Studi</th>
                <th>IPK</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Asgevara Maqarav Zarba</td>
                <td>Laki-laki</td>
                <td>Sistem Informasi</td>
                <td>4.0</td>
            </tr>
        </table>
    ";
    ?>