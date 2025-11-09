<?php
// Página principal
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Gerador de Currículo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <a class="navbar-brand fw-bold" href="#">Gerador de Currículo</a>
</nav>

<div class="container my-4">
  <h1 class="mb-3">Preencha seus dados</h1>

  <form id="form-cv" method="post" action="gerar.php" target="_blank">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Nome completo</label>
        <input name="nome" required class="form-control" type="text" />
      </div>
      <div class="col-md-3">
        <label class="form-label">Data de nascimento</label>
        <input id="nascimento" name="nascimento" required class="form-control" type="date" />
      </div>
      <div class="col-md-3">
        <label class="form-label">Idade</label>
        <input id="idade" name="idade" readonly class="form-control" type="text" placeholder="—" />
      </div>
      <div class="col-md-6">
        <label class="form-label">E-mail</label>
        <input name="email" class="form-control" type="email" />
      </div>
      <div class="col-md-6">
        <label class="form-label">Telefone</label>
        <input name="telefone" class="form-control" type="text" />
      </div>

      <div class="col-12">
        <label class="form-label">Experiências profissionais</label>
        <div id="lista-experiencias" class="mb-2"></div>
        <button id="adicionar-experiencia" type="button" class="btn btn-outline-primary btn-sm">+ Adicionar experiência</button>
      </div>

      <div class="col-12">
        <label class="form-label">Habilidades (separe por vírgula)</label>
        <input name="habilidades" class="form-control" type="text" placeholder="Ex: HTML, CSS, PHP" />
      </div>

      <div class="col-12">
        <button class="btn btn-success" type="submit">Gerar PDF</button>
      </div>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
