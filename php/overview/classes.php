<?php
include '../DB_connect.php';

$studentInfo;

$statement = 'SELECT * FROM `user_info` ORDER BY `klas`';
if ($query = mysqli_query($conn, $statement)) {
  while($fetch = mysqli_fetch_assoc($query)) {
    $klas = $fetch['klas'];
    $query1 = mysqli_query($conn, 'SELECT * FROM `account` WHERE id='.$fetch['id']);
    while ($fetch1 = mysqli_fetch_assoc($query1)) {
      $username = $fetch1['usr_name'];
    }
    if (isset($studentInfo[$klas])) {
      $studentInfo[$klas] .= ', '.$username;
    } else {
      $studentInfo[$klas] = $username;
    }
  }
} else {
  echo 'Error';
}

?>
<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="number">#</th>
          <th scope="col" class="klas">Klas</th>
          <th scope="col" class="leden">Leden</th>
        </tr>
      </thead>
      <tbody>
<?php

$count = 1;
foreach ($studentInfo as $key => $value) {
  echo '<tr>
    <td>'.$count.'</td>
    <td>'.$key.'</td>
    <td>'.$value.'</td>
  </tr>';
  $count++;
}

?>
</tbody>
</table>
</div><!--end of .table-responsive-->
</div>
</div>
