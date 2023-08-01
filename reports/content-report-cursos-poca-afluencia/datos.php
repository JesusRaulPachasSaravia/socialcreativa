<div class="container text-center">
    <h2>Cursos con poca afluencia</h2>
    <p>ONG Social Creativa</p>
</div>

<div class="container mt-3">
  <table class="table table-border">
    <colgroup>
      <col style="width:10%;">
      <col style="width:45%;">
      <col style="width:45%;">
    </colgroup>
    <thead>
      <tr class="bg-primary">  
        <th>#</th>
        <th>Titulo del curso</th>
        <th>Inscritos</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($datos as $registro): ?>
          <tr>
            <td><?= $registro['idcurso'] ?></td>
            <td><?= $registro['titulo'] ?></td>
            <td><?= $registro['inscritos'] ?></td>
          </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>