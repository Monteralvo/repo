<?php
  class Model_start extends Model {
    function __construct() {
      $this->mysqli = mysqli_connect(DB_NAME, DB_USER, DB_USER_PASS);
      if ($this->mysqli) {
        
      }
    }
  }
?>