<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM users");

echo "<h1>Daftar Nama dari Database</h1>";


echo "<table border='1' cellpadding='10' cellspacing='0'>
        <tr bgcolor='#ccc'>
            <th>Nama</th>
            <th>Email</th>
        </tr>";


while ($data = mysqli_fetch_assoc($query)) {
    echo "<tr>
            <td>" . $data['nama'] . "</td>
            <td>" . $data['email'] . "</td>
          </tr>";
}


echo "</table>";
?>