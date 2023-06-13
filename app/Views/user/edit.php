<?php
$this->extend('/layout/main.php');
$this->section('content'); ?>

<?php echo form_open('/user/' . $user->id, ['id' => 'editUserForm']); ?>
<div class="row col-4 p-3 w-50 m-auto" style="border:1px solid #eaeaea;">
<fieldset>
    <legend>Formulário de edição!</legend>
    <hr>
    <div>
        <?php session()->getFlashdata('message') ?? ''; ?>
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" class="form-control" id="idEdit" value="<?= $user->id ?>"><br>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome :: </label>
        <input type="text" name="name" class="form-control" id="nameEdit" placeholder="Digite o nome" value="<?= set_value('name',$user->name) ?>" onfocus="clearMessageError(['fieldName']);">
        <div id="fieldName" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['name'] ?? ''; ?></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-mail :: </label>
        <input type="email" name="email" class="form-control" id="emailEdit" placeholder="Seu melhor e-mail" value="<?= set_value('email',$user->email) ?>" onfocus="clearMessageError(['fieldEmail']);">
        <div id="fieldEmail" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['email'] ?? ''; ?></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite nova senha :: </label>
        <input type="password" name="password" class="form-control" id="passwordEdit" placeholder="Digite uma senha" onfocus="clearMessageError(['fieldPasseword']);">
        <div id="fieldPasseword" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['password'] ?? ''; ?></div>
    </div>


    <button type="submit" class="btn btn-primary">Salvar</button>
    </fieldset>

</div>
<?php echo form_close(); ?>

<?php $this->endSection();
