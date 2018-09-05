<?php use Module\Tasklist\View\SRC\Task\Update as View_Update; ?>
<div class="container-fluid task_list">
	<h2>Atualizar Tarefa: <span class="badge cyan">View & Settings</span></h2>
    <div class="row-fluid">
        <form class="text-center border border-light p-5">
            <input type="text" id="title" value="<?= View_Update::getTitle(); ?>" class="form-control mb-4" placeholder="Titulo">
            <div class="form-group">
                <textarea class="form-control rounded-0" id="description" rows="3" placeholder="Descrição"><?= View_Update::getDescription(); ?></textarea>
            </div>
            <input type="text" id="finished_at" value="<?= View_Update::getFinishedAt(); ?>" class="form-control mb-4" placeholder="Data do Termino">
            <input type="text" id="created_at" value="<?= View_Update::getCreateAt(); ?>" class="form-control mb-4" placeholder="Data da Criação" disabled>
            <input type="text" id="updated_at" value="<?= View_Update::getUpdatedAt(); ?>" class="form-control mb-4" placeholder="Data da Ultima Atualização" disabled>
            <input type="text" id="deleted_at" value="<?= View_Update::getDeletedAt(); ?>" class="form-control mb-4" placeholder="Data da Exclusão" disabled>
            <button onclick="updateTask(<?= View_Update::getId(); ?>)" type="button" class="btn btn-success">Salvar Alterações</button>
        	<button onclick="deleteTask(<?= View_Update::getId(); ?>)" type="button" class="btn btn-danger">Deletar Task</button>
        	<a href="/" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="/js/task/update.js"></script>