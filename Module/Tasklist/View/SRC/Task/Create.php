<?php
namespace Module\Tasklist\View\SRC\Task;
    
    use Module\Tasklist\View\SRC\Template\Site as Template_Site;
    
    class Create
    {
        function __construct()
        {
            
        }
        
        /**
         * 
         */
        public function execute(): void
        {
            $template = new Template_Site();
            
            $template->setPageDir('/Module/Tasklist/View/HTML/Task/Create.php')
                     ->setPageTitle('Create Task Page');
            
            $template->execute();
        }
    }
