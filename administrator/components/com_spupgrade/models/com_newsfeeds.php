<?php

/**
 * @package		SP Upgrade
 * @subpackage	Components
 * @copyright	KAINOTOMO PH LTD - All rights reserved.
 * @author		KAINOTOMO PH LTD
 * @link		http://www.kainotomo.com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.model');

class SPUpgradeModelCom_Newsfeeds extends SPUpgradeModelCom {


    public function __construct($config = array()) {
        
        parent::__construct($config);
        
        switch ($this->task->name) {

            case 'categories':
                $this->id = 'id';
                $this->table_name = 'categories';

                break;

            case 'newsfeeds':
                $this->id = 'id';
                $this->table_name = 'newsfeeds';

                break;

            default:
                break;
        }

        $jinput = JFactory::$application->input;
        if ($jinput->get('task') == 'transfer_all') {
            $this->params->set('duplicate_alias', 1);
            $this->params->set('new_ids', 2);
        }

    }

    public function categories($ids = null) {
        //initialize
        $this->destination_table = $this->factory->getTable('Category', 'JTable');
        $this->task->section = ' WHERE section LIKE "COM_NEWSFEEDS"';
        $this->task->state = 4; //state for success

        parent::categories($ids);
    }

    public function newsfeeds($ids = null) {
        //initialize
        JTable::addIncludePath(JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . $this->task->extension_name . DIRECTORY_SEPARATOR . 'tables');
        $this->destination_table = $this->factory->getTable('Newsfeed', 'NewsfeedsTable');
        $this->table_name = 'newsfeeds';
        $this->task->category = 10;
        $this->id = 'id';
        $this->task->query = 'SELECT ' . $this->id . ' 
            FROM #__' . $this->table_name . '
            WHERE ' . $this->id . ' > 0';

        $this->items($ids);
    }

}
