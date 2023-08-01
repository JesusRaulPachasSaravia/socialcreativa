<?php
// Se incluye el archivo permisos.php que contiene permisos de acceso
require_once 'permisos.php';
?>

<div class="row">
  <div class="col-md-1 col-1">
    <!-- Espacio vacío en la columna -->
  </div>

  <div class="col-md-10 col-10 mt-5">
    <!-- Encabezado -->
    <h2 class="text-center mt-5">Métodos de pago</h2>

    <div align="center">
      <!-- Nombre de la asociación con imagen del banco -->
      <span class="text-primary text-lg ms-4">Asociación Civil Social Creativa</span>
      <img src="../images/bcp.png" class="mb-1" alt="Logo BCP">
    </div>

    <!-- Filas para mostrar los métodos de pago -->
    <div class="row mt-5">
      <!-- Cuenta CTE -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <img class="card-img-top" src="../images/fondo_pagos.jpg" alt="Fondo de pagos">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cuenta CTE</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">315-2513855-0-91</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-credit-card fa-2x text-dark"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Código de Cuenta Interbancario (CCI) -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <img class="card-img-top" src="../images/fondo_pagos.jpg" alt="Fondo de pagos">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Código de Cuenta Interbancario</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">002-31500251385509105</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-credit-card fa-2x text-dark"></i>
              </div>
            </div>
          </div>
        </div>
      </div>   

      <!-- RUC -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <img class="card-img-top" src="../images/fondo_pagos.jpg" alt="Fondo de pagos">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">RUC</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">20534348607</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-pen-to-square fa-2x text-dark"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del row -->
  </div>
</div>
