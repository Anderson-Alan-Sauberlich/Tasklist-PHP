<?php
namespace Module\Tasklist\Controller\Task;
    
    use Module\Tasklist\View\SRC\Task\Update as View_Update;
    use Module\Tasklist\Model\DAO\Task as DAO_Task;
    use Module\Tasklist\Model\OBJ\Task as OBJ_Task;
    use Module\Tasklist\Model\OBJ\Status as OBJ_Status;
    
    class Update
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
         * Sets the Task id.
         * @param int $id
         * @return Update
         */
        public function setId($id): Update
        {
            if (empty($id)) {
                $this->errors[] = 'Id not informed';
            } else {
                $this->obj_task->setId($id);
            }
            
            return $this;
        }
        
        /**
         * Sets the Task title.
         * @param string $title
         * @return Update
         */
        public function setTitle($title): Update
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
         * @return Update
         */
        public function setDescription($description): Update
        {
            if (empty($description)) {
                $this->errors[] = 'Description not informed';
            } else {
                $this->obj_task->setDescription($description);
            }
            
            return $this;
        }
        
        /**
         * Sets the task created at.
         * @param string $created_at
         * @return Update
         */
        public function setCreatedAt($created_at): Update
        {
            if (empty($created_at)) {
                $this->errors[] = 'Created at not informed';
            } else {
                $this->obj_task->setCreatedAt($created_at);
            }
            
            return $this;
        }
        
        /**
         * Sets the task updated at.
         * @param string $updated_at
         * @return Update
         */
        public function setUpdatedAt($updated_at): Update
        {
            if (empty($updated_at)) {
                $this->errors[] = 'Updated at not informed';
            } else {
                $this->obj_task->setUpdatedAt($updated_at);
            }
            
            return $this;
        }
        
        /**
         * Sets the task deleted at.
         * @param string $deleted_at
         * @return Update
         */
        public function setDeleteddAt($deleted_at): Update
        {
            if (empty($deleted_at)) {
                $this->errors[] = 'Deleted at not informed';
            } else {
                $this->obj_task->setDeletedAt($deleted_at);
            }
            
            return $this;
        }
        
        /**
         * Sets the task finished at.
         * @param string $finished_at
         * @return Update
         */
        public function setFinishedAt($finished_at): Update
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
        public function loadPage()
        {
            if (empty($this->errors)) {
                $this->obj_task = DAO_Task::searchById($this->obj_task->getId());
                
                if ($this->obj_task instanceof OBJ_Task) {
                    $view = new View_Update($this->obj_task);
                    
                    $view->execute();
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        
        /**
         * Return false on error and true if success.
         * @return void
         */
        public function updateTask(): void
        {
            $value = [];
            $value['errors'] = '';
            
            $this->obj_task->setStatusId(OBJ_Status::CREATED);
            $this->obj_task->setUpdatedAt(date('Y-m-d H:i:s'));
            
            if (empty($this->errors)) {
                if (!DAO_Task::update($this->obj_task)) {
                    $this->errors[] = 'Sorry, error on traing to update the Task.';
                }
            }
            
            if (count($this->errors) > 0) {
                foreach ($this->errors as $error) {
                    $value['errors'] .= "$error ";
                }
            }
            
            echo json_encode($value);
        }
        
        /**
         * Return false on error and true if success.
         * @return void
         */
        public function deleteTask(): void
        {
            $value = [];
            $value['errors'] = '';
            
            $this->obj_task->setStatusId(OBJ_Status::DELETED);
            $this->obj_task->setDeletedAt(date('Y-m-d H:i:s'));
            
            if (empty($this->errors)) {
                if (!DAO_Task::updateStatus($this->obj_task)) {
                    $this->errors[] = 'Sorry, error on traing to set the task status to deleted.';
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
