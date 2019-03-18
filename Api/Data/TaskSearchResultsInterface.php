<?php


namespace Pronko\Task\Api\Data;

/**
 * Interface TaskSearchResultsInterface
 * @package Pronko\Task\Api\Data
 */
interface TaskSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Task list.
     * @return \Pronko\Task\Api\Data\TaskInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Pronko\Task\Api\Data\TaskInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
