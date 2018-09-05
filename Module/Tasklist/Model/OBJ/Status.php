<?php
namespace Module\Tasklist\Model\OBJ;
    
    /**
     *
     * @author anderson-alan
     *
     * Object Status of Task: bool or multi
     */
    class Status
    {
        /**
         * @const Parameter Status
         */
        public const CREATED = 1;
        
        /**
         * @const Parameter Status
         */
        public const FINISHED = 2;
        
        /**
         * @const Parameter Status
         */
        public const DELETED = 4;
        
        /**
         * Variable to store the status id.
         * @var int $id.
         */
        private $id;
        
        /**
         * Variable to store the status description.
         * @var string $description.
         */
        private $description;
        
        function __constructor()
        {
            
        }
        
        /**
         * Get status id.
         * @return int|NULL
         */
        public function getId(): ?int
        {
            return $this->id;
        }
        
        /**
         * Set status id.
         * @param int $id
         * @return Status
         */
        public function setId(int $id): Status
        {
            $this->id = $id;
            
            return $this;
        }
        
        /**
         * Get status description.
         * @return string|NULL
         */
        public function getDescription(): ?string
        {
            return $this->description;
        }
        
        /**
         * Set status description.
         * @param string $description.
         * @return Status
         */
        public function setDescription(string $description): Status
        {
            $this->description = $description;
            
            return $this;
        }
    }
