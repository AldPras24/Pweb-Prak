<?php
$file = 'alumni.csv';
function readData($file) {
    $data = [];
    if (file_exists($file)) {
        $handle = fopen($file, 'r');
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}
function writeData($file, $data) {
    $handle = fopen($file, 'w');
    foreach ($data as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);
}
$action = $_REQUEST['action'] ?? '';

if ($action == 'read') {
    $data = readData($file);
    foreach ($data as $index => $row) {
        echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td><button class='btn btn-danger btn-sm deleteBtn' data-index='$index'>Hapus</button></td>
              </tr>";
    }
} elseif ($action == 'create') {
    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $major = $_POST['major'];
    $year = $_POST['year'];
    $data = readData($file);
    $data[] = [$nim, $name, $major, $year];
    writeData($file, $data);
} elseif ($action == 'delete') {
    $index = $_POST['index'];
    $data = readData($file);
    unset($data[$index]);
    writeData($file, array_values($data));
}
?>
