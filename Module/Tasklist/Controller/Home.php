<?php
namespace Module\Tasklist\Controller;
    
    use Module\Tasklist\View\SRC\Home as View_Home;
    use Module\Tasklist\Model\DAO\Task as DAO_Task;
    use Module\Tasklist\Model\OBJ\Status as OBJ_Status;
    
    class Home
    {
        function __construct()
        {
            
        }
        
        /**
         * Calls the view, sets his variables and requires the template and pass the content page and load the HTML file.
         */
        public function loadPage(): void
        {
            $view = new View_Home();
            
            $tasks = DAO_Task::searchByStatusId(OBJ_Status::CREATED);
            $view->setTasks($tasks);
            
            $view->execute();
        }
    }
