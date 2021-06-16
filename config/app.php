<?php

//Archivo de configuración de la aplicacion


// const SERVERURL = "https://nuevoempleo.000webhostapp.com/";
// const EMPRESA = "NuevoEmpleo";
// const SERVER = "145.14.144.229:3306";
// const DB = "id16950757_nuevoempleobd";
// const USER = "id16950757_nuevoempleouser";
// const PASS = "Augustogonzalez1_";
// const SGDB = "mysql:host=" . SERVER . ";dbname=" . DB;

// define('SERVERURL','http://20.86.179.232/');
// define('EMPRESA','NuevoEmpleo');
// define('SERVER','20.86.179.232:3306');
// define('DB','nuevoempleo');
// define('USER','root');
// define('PASS','1981Marcellus_');
// define('SGDB','mysql:host=20.86.179.232:3306;dbname=nuevoempleo');

//Definimos las constantes para la cadena de conexion para produccion
// define('SERVERURL', 'http://20.86.179.232/');
// define('EMPRESA', 'NuevoEmpleo');
// define('MYSQL_HOST', 'mysql:host=localhost;dbname=id17015083_nuevoempleo');
// define('USUARIO', 'id17015083_nuevoempleouser');
// define('CONTRASENA', '1981Marcellus_');


//Definimos las constantes para la cadena de conexion para produccion
define('SERVERURL', 'http://localhost/');
define('EMPRESA', 'NuevoEmpleo');
define('MYSQL_HOST', 'mysql:host=localhost;dbname=nuevoempleo');
define('USUARIO', 'root');
define('CONTRASENA', '');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
