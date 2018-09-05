<?php
namespace Module\Tasklist\View\SRC\Task;
    
    use Module\Tasklist\View\SRC\Template\Site as Template_Site;
    use Module\Tasklist\Model\OBJ\Task as OBJ_Task;
    
    class Update
    {
        /**
         *
         * @var OBJ_Task $obj_task;
         */
        private static $obj_task;
        
        function __construct(OBJ_Task $obj_task)
        {
            self::$obj_task = $obj_task;
        }
        
        /**
         * 
         */
        public function execute(): void
        {
            $template = new Template_Site();
            
            $template->setPageDir('/Module/Tasklist/View/HTML/Task/Update.php')
                     ->setPageTitle('Update Task Page');
            
            $template->execute();
        }
        
        /**
         * Is called on the HTML update to set the id from the task.
         * @return int|NULL
         */
        public static function getId(): ?int
        {
            return self::$obj_task->getId();
        }
        
        /**
         * Is called on the HTML update to set the tite from the task.
         * @return string|NULL
         */
        public static function getTitle(): ?string
        {
            return self::$obj_task->getTitle();
        }
        
        /**
         * Is called on the HTML update to set the description from the task.
         * @return string|NULL
         */
        public static function getDescription(): ?string
        {
            return self::$obj_task->getDescription();
        }
        
        /**
         * Is called on the HTML update to set the create at from the task.
         * @return string|NULL
         */
        public static function getCreateAt(): ?string
        {
            return self::$obj_task->getCreatedAt();
        }
        
        /**
         * Is called on the HTML update to set the update at from the task.
         * @return string|NULL
         */
        public static function getUpdatedAt(): ?string
        {
            return self::$obj_task->getUpdatedAt();
        }
        
        /**
         * Is called on the HTML update to set the deleted at from the task.
         * @return string|NULL
         */
        public static function getDeletedAt(): ?string
        {
            return self::$obj_task->getDeletedAt();
        }
        
        /**
         * Is called on the HTML update to set the finished at from the task.
         * @return string|NULL
         */
        public static function getFinishedAt(): ?string
        {
            return self::$obj_task->getFinishedAt();
        }
    }
