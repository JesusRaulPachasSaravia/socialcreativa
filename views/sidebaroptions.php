<?php

// 1. Necesitamos saber qué NIVEL DE ACCESO tiene el usuario
// Revise controlador...
$permiso = $_SESSION['login']['nivelacceso'];

// 2. Array con los permisos por cada NIVEL DE ACCESO
$opciones = [];

// ADM - SPV - AST
switch ($permiso) {
    case "R":
        $opciones = [
            ["menu" => "Pagos", "url" => "index.php?view=pagos.php", "icono" => "<i class='fa-solid fa-credit-card'></i>"],
            ["menu" => "Cursos", "url" => "index.php?view=cursos-admin.php", "icono" => "<i class='fa-solid fa-book'></i>"],
            ["menu" => "Personas", "url" => "index.php?view=personas.php", "icono" => "<i class='fa-solid fa-user-group'></i>"],
            ["menu" => "Deudores", "url" => "index.php?view=deudores.php", "icono" => "<i class='fa-solid fa-user'></i>"],
            ["menu" => "Aulas", "url" => "index.php?view=aulas.php", "icono" => "<i class='fa-solid fa-people-roof'></i>"],
            ["menu" => "Horarios", "url" => "index.php?view=horarios-admin.php", "icono" => "<i class='fa-solid fa-calendar'></i>"],
            ["menu" => "Mis Horarios", "url" => "index.php?view=horarios.php", "icono" => "<i class='fa-solid fa-calendar'></i>"],
            ["menu" => "Reportes", "url" => "index.php?view=reportes.php", "icono" => "<i class='fa-solid fa-chart-area'></i>"]
        ];
        break;
    case "A":
        $opciones = [
            ["menu" => "Pagos", "url" => "index.php?view=pagos.php", "icono" => "<i class='fa-solid fa-credit-card'></i>"],
            ["menu" => "Cursos", "url" => "index.php?view=cursos-admin.php", "icono" => "<i class='fa-solid fa-book'></i>"],
            ["menu" => "Personas", "url" => "index.php?view=personas.php", "icono" => "<i class='fa-solid fa-user-group'></i>"],
            ["menu" => "Profesores", "url" => "index.php?view=profesores.php", "icono" => "<i class='fa-solid fa-chalkboard-user'></i>"],
            ["menu" => "Usuarios", "url" => "index.php?view=deudores.php", "icono" => "<i class='fa-solid fa-user'></i>"],
            ["menu" => "Aulas", "url" => "index.php?view=aulas.php", "icono" => "<i class='fa-solid fa-people-roof'></i>"],
            ["menu" => "Horarios", "url" => "index.php?view=horarios-admin.php", "icono" => "<i class='fa-solid fa-calendar'></i>"],
            ["menu" => "Mis Horarios", "url" => "index.php?view=horarios.php", "icono" => "<i class='fa-solid fa-calendar'></i>"],
            ["menu" => "Reportes", "url" => "index.php?view=reportes.php", "icono" => "<i class='fa-solid fa-chart-area'></i>"]
        ];
        break;
    case "C":
        $opciones = [
            ["menu" => "Tipos de Pagos", "url" => "index.php?view=tipospagos.php", "icono" => "<i class='fa-solid fa-credit-card'></i>"],
            ["menu" => "Cursos", "url" => "index.php?view=cursos.php", "icono" => "<i class='fa-solid fa-book'></i>"],
            ["menu" => "Personas", "url" => "index.php?view=personas.php", "icono" => "<i class='fa-solid fa-user-group'></i>"],
            ["menu" => "Usuarios", "url" => "index.php?view=deudores.php", "icono" => "<i class='fa-solid fa-user'></i>"],
            ["menu" => "Horarios", "url" => "index.php?view=horarios-admin.php", "icono" => "<i class='fa-solid fa-calendar'></i>"],
            ["menu" => "Mis Horarios", "url" => "index.php?view=horarios.php", "icono" => "<i class='fa-solid fa-calendar'></i>"]
        ];
        break;
    case "P":
        $opciones = [
            ["menu" => "Tipos de Pagos", "url" => "index.php?view=tipospagos.php", "icono" => "<i class='fa-solid fa-credit-card'></i>"],
            ["menu" => "Mis Horarios", "url" => "index.php?view=horarios.php", "icono" => "<i class='fa-solid fa-calendar'></i>"]
        ];
        break;
    case "T":
        $opciones = [
            ["menu" => "Tipos de Pagos", "url" => "index.php?view=tipospagos.php", "icono" => "<i class='fa-solid fa-credit-card'></i>"],
            ["menu" => "Cursos", "url" => "index.php?view=cursos.php", "icono" => "<i class='fa-solid fa-book'></i>"],
            ["menu" => "Mis Horarios", "url" => "index.php?view=horarios.php", "icono" => "<i class='fa-solid fa-calendar'></i>"]
        ];
        break;
}

// Renderizar los ítems del SIDEBAR
foreach ($opciones as $item) {
    if ($item['menu'] == "Reportes") {
        echo "
            <hr class='sidebar-divider'>
            <div class='sidebar-heading'>
                Reportes
            </div>
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                    <i class='fas fa-fw fa-chart-simple'></i>
                    <span>Tipos de reportes</span>
                </a>
                <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Lista de opciones:</h6>
                        <a class='collapse-item' href='index.php?view=reporte-1.php'>Alumnos inscritos por cursos</a>
                        <a class='collapse-item' href='index.php?view=reporte-2.php'>Dinero recaudado por curso</a>
                        <a class='collapse-item' href='index.php?view=reporte-3.php'>Obtener afluencia de cursos</a>
                    </div>
                </div>
            </li>
        ";
    } else {
        echo "
            <li class='nav-item'>
                <a class='nav-link' href='{$item['url']}'>
                    {$item['icono']}
                    <span>{$item['menu']}</span>
                </a>
            </li>
        ";
    }
}
