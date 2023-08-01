<?php

require_once "../models/Categoria.php";


if(isset($_POST['operacion'])){

    $categoria = new Categoria();


    if($_POST['operacion']=='listarCategorias'){
        echo json_encode($categoria->listarCategorias());
    }


    if($_POST['operacion']=='registrarCategorias'){
        $datosSolicitados=[
            "idespecialidad"    =>$_POST['idespecialidad'],
            "categoria"         =>$_POST['categoria']
        ];

        $respuesta = $categoria->registrarCategorias($datosSolicitados);
        echo json_encode($respuesta);
    }


    if($_POST['operacion']=='actualizarCategorias'){
        $datosSolicitados=[
            "idcategoria"       =>$_POST['idcategoria'],
            "idespecialidad"    =>$_POST['idespecialidad'],
            "categoria"         =>$_POST['categoria']
        ];

        $respuesta = $categoria->actualizarCategorias($datosSolicitados);
        echo json_encode($respuesta);
    }


    if($_POST['operacion']=='getCategoria'){
        echo json_encode($categoria->getCategoria($_POST['idcategoria']));
    }


    if($_POST['operacion']=='eliminarCategoria'){
        $respuesta= $categoria->eliminarCategoria($_POST['idcategoria']);
        echo json_encode($respuesta);
    }




}