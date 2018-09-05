<?php
namespace Module\Tasklist\Model\OBJ;
    
    use Module\Tasklist\Model\OBJ\Status as OBJ_Status;
    use \DateTime;
    
    /**
     *
     * @author anderson-alan
     *
     * Object Result
     */
    class Task
    {
        /**
         * Variable to store the result id.
         * @var int $id.
         */
        private $id;
        
        /**
         * Variable to store the task status object.
         * @var OBJ_Status $obj_status.
         */
        private $obj_status;
        
        /**
         * Variable to store the task title.
         * @var string $title.
         */
        private $title;
        
        /**
         * Variable to store the task description.
         * @var string $description.
         */
        private $description;
        
        /**
         * Variable to store the task creation date time.
         * @var string $created_at.
         */
        private $created_at;
        
        /**
         * Variable to store the task updated date time.
         * @var string $updated_at.
         */
        private $updated_at;
        
        /**
         * Variable to store the task deleted date time.
         * @var string $deleted_at.
         */
        private $deleted_at;
        
        /**
         * Variable to store the task finish date time.
         * @var string $finished_at.
         */
        private $finished_at;
        
        function __constructor()
        {
            
        }
        
        /**
         * Get task id.
         * @return int|NULL
         */
        public function getId(): ?int
        {
            return $this->id;
        }
        
        /**
         * Set task id.
         * @param int $id
         * @return Task
         */
        public function setId(int $id): Task
        {
            $this->id = $id;
            
            return $this;
        }
        
        /**
         * Get task status id.
         * @return int|NULL
         */
        public function getStatusId(): ?int
        {
            if ($this->obj_status instanceof OBJ_Status) {
                return $this->obj_status->getId();
            } else {
                return null;
            }
        }
        
        /**
         * Set task status id.
         * @param int $status_id
         * @return Task
         */
        public function setStatusId(int $status_id): Task
        {
            if (!$this->obj_status instanceof OBJ_Status) {
                $this->obj_status = new OBJ_Status();
            }
            
            $this->obj_status->setId($status_id);
            
            return $this;
        }
        
        /**
         * Get task status object.
         * @return OBJ_Status|NULL
         */
        public function getStatus(): ?OBJ_Status
        {
            return $this->obj_status;
        }
        
        /**
         * Set task status object.
         * @param OBJ_Status $obj_status
         * @return Task
         */
        public function setStatus(OBJ_Status $obj_status): Task
        {
            $this->obj_status = $obj_status;
            
            return $this;
        }
        
        /**
         * Get task title.
         * @return string|NULL
         */
        public function getTitle(): ?string
        {
            return $this->title;
        }
        
        /**
         * Set task title.
         * @param string $title.
         * @return Task
         */
        public function setTitle(string $title): Task
        {
            $this->title = $title;
            
            return $this;
        }
        
        /**
         * Get task description.
         * @return string|NULL
         */
        public function getDescription(): ?string
        {
            return $this->description;
        }
        
        /**
         * Set task description.
         * @param string $description.
         * @return Task
         */
        public function setDescription(string $description): Task
        {
            $this->description = $description;
            
            return $this;
        }
        
        /**
         * Get task creation date and time.
         * @return string|NULL
         */
        public function getCreatedAt(): ?string
        {
            return $this->created_at;
        }
        
        /**
         * Set task creation date and time.
         * @param string $created_at
         * @return Task
         */
        public function setCreatedAt(string $created_at): Task
        {
            $this->created_at = $created_at;
            
            return $this;
        }
        
        /**
         * Get task updated date and time.
         * @return string|NULL
         */
        public function getUpdatedAt(): ?string
        {
            return $this->updated_at;
        }
        
        /**
         * Set task updated date and time.
         * @param string $updated_at
         * @return Task
         */
        public function setUpdatedAt(string $updated_at): Task
        {
            $this->updated_at = $updated_at;
            
            return $this;
        }
        
        /**
         * Get task deleted date and time.
         * @return string|NULL
         */
        public function getDeletedAt(): ?string
        {
            return $this->deleted_at;
        }
        
        /**
         * Set task deleted date and time.
         * @param string $deleted_at
         * @return Task
         */
        public function setDeletedAt(string $deleted_at): Task
        {
            $this->deleted_at = $deleted_at;
            
            return $this;
        }
        
        /**
         * Get task finished date and time.
         * @return string|NULL
         */
        public function getFinishedAt(): ?string
        {
            return $this->finished_at;
        }
        
        /**
         * Set task finished date and time.
         * @param string $finished_at
         * @return Task
         */
        public function setFinishedAt(string $finished_at): Task
        {
            $this->finished_at = $finished_at;
            
            return $this;
        }
    }
