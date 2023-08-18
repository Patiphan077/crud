<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
CREATE TABLE `dashboard` (
    `ID` int(11) NOT NULL,
    `name` varchar(30) NOT NULL,
    `prices` int(11) NOT NULL
) ENGINE= InnoDB DEFAULT CHARSET=utf8;
$connect = new mysqli('localhost', 'root', '', 'demo');

// ทำการ check connection ว่าถูกต้องหรือไม่
 if ($connect->connect_error) {
       die("Something wrong.: " . $connect->connect_error);
  }
  