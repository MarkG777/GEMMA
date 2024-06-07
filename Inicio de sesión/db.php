<?php
$servername = "localhost";
$username = "root"; // Cambiar según sea necesario
$password = ""; // Cambiar según sea necesario
$dbname = "relojes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//script para base de datos (CREEN LA BASE DE DATOS ANTES DE CORRERLA EN APACHE)
/*
create database relojes;
use relojes;

create table usuarios(
nombres char(30),
email char(30) primary key,
password char(30)
);

alter table usuarios add column rol varchar (50);

select * from usuarios;

*/