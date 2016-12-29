<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 13-09-2016
 * Time: 23:19
 */
//Clear Session
session_start();
session_destroy();
header("Location: ./");