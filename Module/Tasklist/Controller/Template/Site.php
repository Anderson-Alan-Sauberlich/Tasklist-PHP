<?php
namespace Module\Tasklist\Controller\Template;
    
    use Module\Tasklist\View\SRC\Template\Site as View_Site;
    
    class Site
    {
        function __construct()
        {
            
        }
        
        public function loadPage(): void
        {
            $view = new View_Site();
            
            $view->execute();
        }
    }
