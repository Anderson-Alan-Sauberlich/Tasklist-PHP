<?php
namespace Module\Tasklist\View\SRC;
    
    use Module\Tasklist\View\SRC\Template\Site as Template_Site;
    
    class Home
    {
        /**
         * Variable to store the list of tasks.
         * @var array $tasks.
         */
        private static $tasks = [];
        
        function __construct()
        {
            
        }
        
        /**
         * Set tasks list.
         * @param array $tasks
         * @return Home
         */
        public function setTasks(array $tasks): Home
        {
            self::$tasks = $tasks;
            
            return $this;
        }
        
        /**
         * 
         */
        public function execute(): void
        {
            $template = new Template_Site();
            
            $template->setPageDir('/Module/Tasklist/View/HTML/Home.php')
                     ->setPageTitle('Home Page');
            
            $template->execute();
        }
        
        /**
         * Is called on the HTML home to set the list if tasks.
         * @return array|NULL
         */
        public static function getTasks(): ?array
        {
            return self::$tasks;
        }
    }
