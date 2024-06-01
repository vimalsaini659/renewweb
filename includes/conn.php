<?php
$host="localhost";
$username="root";
$password="";
$dbname="renewweb";
$conn=new mysqli($host,$username,$password,$dbname);
if(!$conn){
    die("Not Connected");
}
