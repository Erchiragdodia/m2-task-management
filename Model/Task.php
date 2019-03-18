<?php


namespace Pronko\Task\Model;

use Magento\Framework\Api\DataObjectHelper;
use Pronko\Task\Api\Data\TaskInterfaceFactory;
use Pronko\Task\Api\Data\TaskInterface;

/**
 * Class Task
 * @package Pronko\Task\Model
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Task extends \Magento\Framework\Model\AbstractModel
{

    /**
     * @var TaskInterfaceFactory
     */
    protected $taskDataFactory;

    /**
     * @var string
     */
    protected $_eventPrefix = 'pronko_task_task';
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param TaskInterfaceFactory $taskDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Pronko\Task\Model\ResourceModel\Task $resource
     * @param \Pronko\Task\Model\ResourceModel\Task\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        TaskInterfaceFactory $taskDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Pronko\Task\Model\ResourceModel\Task $resource,
        \Pronko\Task\Model\ResourceModel\Task\Collection $resourceCollection,
        array $data = []
    ) {
        $this->taskDataFactory = $taskDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve task model with task data
     * @return TaskInterface
     */
    public function getDataModel()
    {
        $taskData = $this->getData();
        
        $taskDataObject = $this->taskDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $taskDataObject,
            $taskData,
            TaskInterface::class
        );
        
        return $taskDataObject;
    }
}
