<?php
$this->extend('/layout/main.php');
$this->section('content'); ?>

<?php echo form_open('/user/'.$user->id); ?>
<div>
    <div>
        <?php session()->getFlashdata('message')?? '';?>
    </div>

    <label>Nome::</label>
    <input type="hidden" name="_method" value="DELETE">
    <input type="text" name="id" class="form-control" id="id" placeholder="Digite o nome" value="<?= $user->id?>"><br>
    <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome" value="<?= $user->name?>"><br>
    <?php echo session()->getFlashdata('errors')['name'] ?? ''; ?><br>
    <label>Email::</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Digite o email" value="<?= $user->email?>"><br>
    <?php echo session()->getFlashdata('errors')['email'] ?? ''; ?><br>
    <br>
    <label>Password::</label>
    <input type="text" name="password" class="form-control" id="password" placeholder="Digite a senha" value=""><br>
    <?php echo session()->getFlashdata('errors')['password'] ?? ''; ?><br>
    <br>
    <input type="submit" value="Salvar" />
</div>
<?php echo form_close();

$this->endSection();
