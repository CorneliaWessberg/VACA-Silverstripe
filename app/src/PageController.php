<?php

namespace {

    use SilverStripe\ORM\PaginatedList;
    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Control\HTTPRequest;
    use SilverStripe\Dev\Debug;

class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [
            'index',
            ''

        ];

        public function index(HTTPRequest $request) {
           
            $sortDirection = $request->getVar('dir') === 'DESC' ? 'DESC' : "ASC"; 

            switch ($request->getVar('sort')) {
                case 'Price':
                    $sort = 'Price';
                        break;
                case 'Created' : 
                    $sort = 'Created';
                        break; 
                default:
                    $sort = 'Title';
                        break;
            }
            
            $Products = $this->Products()->sort($sort, $sortDirection);
            $PaginatedList = new PaginatedList($Products, $request);
            $PaginatedList->setPageLength(4);

            return [
                'Products' => $Products,
                'PaginatedList' => $PaginatedList 
            ]; 
        }

        public function PaginatedPages() 
        {
            $list = Page::get();

            return new PaginatedList($list, $this->getRequest());
        }

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }
    }
}
