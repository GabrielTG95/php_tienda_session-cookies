Autor: Gabriel Trujillo González
Curso: Desarrollo de Aplicaciones Web 2021-22
Asignatura: Desarrollo web en entorno servidor
Información:
    Tecnología utilizada:
        PHP 8.0
        HTML5
        CSS3
        JavaScript
        jQuery 3.5.1
        Bootstrap 5.1.1
        JSON
    Implementado en:
        PhpStorm 2021.2.3
    Ejecutado en:
        Google Chrome
        "Built-in Preview" de PhpStorm
Contacto:
    Correo electrónico:
        gabrieltrujillogonzalez@alumno.ieselrincon.es --> Institucional
        gabrieltrujillotb@gmail.com --> Profesional
    GitHub:
        https://github.com/GabrielTG95
    LinkedIn:
        https://www.linkedin.com/in/gabrieltrujillotb/

EXPLICACIÓN DEL PROFE

COOKIES
========

    3. ELIMINAR COOKIE

        setcookie("nombre", valor -> String, tiempo - 1000,"/");

SESIONES
========

1. session_start(); --> Siempre que queramos usar variables $_SESSION debemos añadirlo al compienzo de la página

    LEER

        $_SESSION['usuario'];
        $_SESSION['perfil'];
        $_SESSION['login'];

    GUARDAR

        $_SESSION['usuario'] = 'Fulano';
        $_SESSION['perfil'] = 'Administrador';
        $_SESSION['login'] = true;

    ELIMINAR

        unset($_SESSION['usuario']);
        session_destroy();

    ELIMINAR COOKIE DE SESIÓN

