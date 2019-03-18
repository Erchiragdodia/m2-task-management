<?php


namespace Pronko\Task\Model\ResourceModel;

/**
 * Class Task
 * @package Pronko\Task\Model\ResourceModel
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Task extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('pronko_task_task', 'task_id');
    }
}
