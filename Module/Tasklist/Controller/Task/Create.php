<?php
namespace Module\Tasklist\Controller\Task;
    
    use Module\Tasklist\View\SRC\Task\Create as View_Create;
    use Module\Tasklist\Model\DAO\Task as DAO_Task;
    use Module\Tasklist\Model\OBJ\Task as OBJ_Task;
    use Module\Tasklist\Model\OBJ\Status as OBJ_Status;
    
    class Create
    {
        /**
         *
         * @var OBJ_Task $obj_task;
         */
        private $obj_task;
        
        /**
         * List of all errors geted by validating the form variables.
         * @var array
         */
        private $errors = [];
        
        function __construct(?OBJ_Task $obj_task = null)
        {
            if ($obj_task instanceof OBJ_Task) {
                $this->obj_task = $obj_task;
            } else {
                $this->obj_task = new OBJ_Task();
            }
        }
        
        /**
         * Sets the Task title.
         * @param string $title
         * @return Create
         */
        public function setTitle($title): Create
        {
            if (empty($title)) {
                $this->errors[] = 'Title not informed';
            } else {
                $this->obj_task->setTitle($title);
            }
            
            return $this;
        }
        
        /**
         * Sets the task description.
         * @param string $description
         * @return Create
         */
        public function setDescription($description): Create
        {
            if (empty($description)) {
                $this->errors[] = 'Description not informed';
            } else {
                $this->obj_task->setDescription($description);
            }
            
            return $this;
        }
        
        /**
         * Sets the task finished at.
         * @param string $finished_at
         * @return Create
         */
        public function setFinishedAt($finished_at): Create
        {
            if (empty($finished_at)) {
                $this->errors[] = 'Finished at not informed';
            } else {
                $this->obj_task->setFinishedAt($finished_at);
            }
            
            return $this;
        }
        
        /**
         * Calls the view, sets his variables and requires the template and pass the content page and load the HTML file.
         */
        public function loadPage(): void
        {
            $view = new View_Create();
            
            $view->execute();
        }
        
        /**
         * Return false on error and true if success.
         * @return void
         */
        public function createNewTask(): void
        {
            $value = [];
            $value['errors'] = '';
            
            $this->obj_task->setStatusId(OBJ_Status::CREATED);
            $this->obj_task->setCreatedAt(date('Y-m-d H:i:s'));
            $this->obj_task->setUpdatedAt(date('Y-m-d H:i:s'));
            
            if (empty($this->errors)) {
                if (!DAO_Task::insert($this->obj_task)) {
                    $this->errors[] = 'Sorry, error on traing to insert new Task.';
                }
            }
            
            if (count($this->errors) > 0) {
                foreach ($this->errors as $error) {
                    $value['errors'] .= "$error ";
                }
            }
            
            echo json_encode($value);
        }
    }
