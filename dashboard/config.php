<?php
 $db_con = mysqli_connect('localhost', 'root', '', 'tech_store');

 if (!$db_con) {
  die("Connection failed: " . mysqli_connect_error());
};
