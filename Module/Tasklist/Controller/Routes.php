<?php
    
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    $app->group('', function() use ($app) {
        $app->get('[/]', function (Request $request, Response $response, array $args) use ($app) {
            $home = new Module\Tasklist\Controller\Home();
            
            $home->loadPage();
            
            return $response;
        });
    });
    
    $app->group('/task', function() use ($app) {
        $app->group('/create', function() use ($app) {
            $app->get('[/]', function (Request $request, Response $response, array $args) use ($app) {
                $create = new Module\Tasklist\Controller\Task\Create();
                
                $create->loadPage();
                
                return $response;
            });
            
            $app->post('[/]', function (Request $request, Response $response, array $args) use ($app) {
                $create = new Module\Tasklist\Controller\Task\Create();
                
                $create->setTitle(isset($_POST['title']) ? $_POST['title'] : null)
                       ->setDescription(isset($_POST['description']) ? $_POST['description'] : null)
                       ->setFinishedAt(isset($_POST['finished_at']) ? $_POST['finished_at'] : null);
                
                $create->createNewTask();
                
                return $response;
            });
        });
        
        $app->group('/update', function() use ($app) {
            $app->get('/{task_id}[/]', function (Request $request, Response $response, array $args) use ($app) {
                $update = new Module\Tasklist\Controller\Task\Update();
                
                $update->setId(isset($args['task_id']) ? $args['task_id'] : null);
                
                $update->loadPage();
                
                return $response;
            });
            
            $app->post('/{task_id}[/]', function (Request $request, Response $response, array $args) use ($app) {
                $update = new Module\Tasklist\Controller\Task\Update();
                
                $update->setTitle(isset($_POST['title']) ? $_POST['title'] : null)
                       ->setDescription(isset($_POST['description']) ? $_POST['description'] : null)
                       ->setFinishedAt(isset($_POST['finished_at']) ? $_POST['finished_at'] : null)
                       ->setId(isset($args['task_id']) ? $args['task_id'] : null);
                
                $update->updateTask();
                
                return $response;
            });
        });
        
        $app->group('/delete', function() use ($app) {
            $app->delete('/{task_id}[/]', function (Request $request, Response $response, array $args) use ($app) {
                $update = new Module\Tasklist\Controller\Task\Update();
                
                $update->setId(isset($args['task_id']) ? $args['task_id'] : null);
                
                $update->deleteTask();
                
                return $response;
            });
        });
    });