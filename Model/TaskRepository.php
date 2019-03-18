<?php


namespace Pronko\Task\Model;

use Pronko\Task\Model\ResourceModel\Task as ResourceTask;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Pronko\Task\Api\Data\TaskSearchResultsInterfaceFactory;
use Pronko\Task\Api\Data\TaskInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Pronko\Task\Model\ResourceModel\Task\CollectionFactory as TaskCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Pronko\Task\Api\TaskRepositoryInterface;

/**
 * Class TaskRepository
 * @package Pronko\Task\Model
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @var TaskInterfaceFactory
     */
    protected $dataTaskFactory;

    /**
     * @var TaskCollectionFactory
     */
    protected $taskCollectionFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var ResourceTask
     */
    protected $resource;

    /**
     * @var ExtensibleDataObjectConverter
     */
    protected $extensibleDataObjectConverter;
    /**
     * @var TaskFactory
     */
    protected $taskFactory;

    /**
     * @var TaskSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;


    /**
     * @param ResourceTask $resource
     * @param TaskFactory $taskFactory
     * @param TaskInterfaceFactory $dataTaskFactory
     * @param TaskCollectionFactory $taskCollectionFactory
     * @param TaskSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceTask $resource,
        TaskFactory $taskFactory,
        TaskInterfaceFactory $dataTaskFactory,
        TaskCollectionFactory $taskCollectionFactory,
        TaskSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
        $this->taskCollectionFactory = $taskCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataTaskFactory = $dataTaskFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Pronko\Task\Api\Data\TaskInterface $task
    ) {
        /* if (empty($task->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $task->setStoreId($storeId);
        } */
        
        $taskData = $this->extensibleDataObjectConverter->toNestedArray(
            $task,
            [],
            \Pronko\Task\Api\Data\TaskInterface::class
        );
        
        $taskModel = $this->taskFactory->create()->setData($taskData);
        
        try {
            $this->resource->save($taskModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the task: %1',
                $exception->getMessage()
            ));
        }
        return $taskModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($taskId)
    {
        $task = $this->taskFactory->create();
        $this->resource->load($task, $taskId);
        if (!$task->getId()) {
            throw new NoSuchEntityException(__('Task with id "%1" does not exist.', $taskId));
        }
        return $task->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->taskCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Pronko\Task\Api\Data\TaskInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Pronko\Task\Api\Data\TaskInterface $task
    ) {
        try {
            $taskModel = $this->taskFactory->create();
            $this->resource->load($taskModel, $task->getTaskId());
            $this->resource->delete($taskModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Task: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($taskId)
    {
        return $this->delete($this->getById($taskId));
    }
}
