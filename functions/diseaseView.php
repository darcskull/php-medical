<?php
require_once 'initialDataBase.php';

function findAllDiseases($conn): array
{
    $diseases = [];
    $sql = "SELECT * FROM DISEASE";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $disease = new stdClass();
            $disease->id = $row['id'];
            $disease->name = $row['name'];
            $disease->description = $row['description'];
            $disease->type= $row['type'];
            $diseases[] = $disease;
        }
    }
    return $diseases;
}
