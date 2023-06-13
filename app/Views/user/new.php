<?php
$this->extend('/layout/main.php');
$this->section('content'); ?>

<?php echo form_open('/user'); ?>
<div class="row col-md-4 order-md-2 mb-4">
    <div>
        <?php session()->getFlashdata('message') ?? ''; ?>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome :: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome" value="<?= old('name') ?>">
        <div id="emailHelp" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['name'] ?? ''; ?></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-mail :: </label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Seu melhor e-mail">
        <div id="emailHelp" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['email'] ?? ''; ?></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha :: </label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Digite uma senha">
        <div id="emailHelp" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['password'] ?? ''; ?></div>
    </div>
   
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>

<?php echo form_close();

$this->endSection();
