<?php


namespace Pronko\Task\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface TaskRepositoryInterface
 * @package Pronko\Task\Api
 */
interface TaskRepositoryInterface
{

    /**
     * Save Task
     * @param \Pronko\Task\Api\Data\TaskInterface $task
     * @return \Pronko\Task\Api\Data\TaskInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Pronko\Task\Api\Data\TaskInterface $task
    );

    /**
     * Retrieve Task
     * @param string $taskId
     * @return \Pronko\Task\Api\Data\TaskInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($taskId);

    /**
     * Retrieve Task matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Pronko\Task\Api\Data\TaskSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Task
     * @param \Pronko\Task\Api\Data\TaskInterface $task
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Pronko\Task\Api\Data\TaskInterface $task
    );

    /**
     * Delete Task by ID
     * @param string $taskId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($taskId);
}
