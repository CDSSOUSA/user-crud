<?php
$this->extend('/layout/main.php');
$this->section('content');
echo session()->getFlashdata('message') ? '<div class="alert alert-' . session()->getFlashdata('type') . ' alert-dismissible fade show" role="alert">
<strong>' . session()->getFlashdata('greeting') . '</strong> ' . session()->getFlashdata('message') . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' : '';

?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col" colspan="2" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= anchor('/user/' . $user->id . '/edit', 'Editar'); ?> </td>                    
                    <td><?= anchor('#', 'Remove', ['onclick' => 'showUser(' . $user->id . ')', 'data-bs-toggle' => 'modal', 'data-bs-target' => 'deleteUserModal']); ?></td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModalLabel">Excluir usuário :: </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('/user/', ['id' => 'deleteUserForm']); ?>
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" class="form-control" id="id"><br>
                <div class="mb-3">
                    <label for="" class="form-label">Nome :: </label>
                    <input type="text" name="name" class="form-control" id="name" disabled placeholder="Digite o nome" value="<?= old('name') ?>">
                    <div id="emailHelp" class="form-text" style="color: red;"><?php echo session()->getFlashdata('errors')['name'] ?? ''; ?></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->endSection();
