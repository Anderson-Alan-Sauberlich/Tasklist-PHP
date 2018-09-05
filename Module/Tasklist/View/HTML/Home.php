<?php use Module\Tasklist\View\SRC\Home as View_Home; ?>
<div class="container-fluid task_list">
	<h2>Tarefas em aberto: <span class="badge cyan">Created</span></h2>
    <div class="row-fluid">
        <div class="list-group">
        <?php foreach (View_Home::getTasks() as $task) { ?>
        	<a href="/task/update/<?= $task->getId(); ?>/" class="list-group-item list-group-item-action waves-effect"><?= $task->getTitle(); ?> | Descrição: <?= $task->getDescription(); ?> | Criada em: <?= $task->getCreatedAt(); ?> | Termina em: <?= $task->getFinishedAt(); ?></a>
        <?php } ?>
        </div>
    </div>
    <a href="/task/create/" type="button" class="btn btn-success btn_add_task"><i class="fa fa-plus-square-o"></i> Criar nova tarefa</a>
</div>
<script type="text/javascript" src="/js/home.js"></script>