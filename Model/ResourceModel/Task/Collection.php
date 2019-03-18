<?php


namespace Pronko\Task\Model\ResourceModel\Task;

/**
 * Class Collection
 * @package Pronko\Task\Model\ResourceModel\Task
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Pronko\Task\Model\Task::class,
            \Pronko\Task\Model\ResourceModel\Task::class
        );
    }
}
