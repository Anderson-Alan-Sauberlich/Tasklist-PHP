<?php use Module\Tasklist\View\SRC\Task\Create as View_Create; ?>
<div class="container-fluid task_list">
	<h2>Criar Tarefa: <span class="badge cyan">New Task</span></h2>
    <div class="row-fluid">
        <form class="text-center border border-light p-5">
            <input type="text" id="title" class="form-control mb-4" placeholder="Titulo">
            <div class="form-group">
                <textarea class="form-control rounded-0" id="description" rows="3" placeholder="Descrição"></textarea>
            </div>
            <input type="text" id="finished_at" class="form-control mb-4" placeholder="Data do Termino">
            <button onclick="createNewTask()" type="button" class="btn btn-success">Salvar Nova Task</button>
        	<a href="/" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="/js/task/create.js"></script>