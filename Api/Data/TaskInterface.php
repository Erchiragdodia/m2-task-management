<?php


namespace Pronko\Task\Api\Data;

/**
 * Interface TaskInterface
 * @package Pronko\Task\Api\Data
 */
interface TaskInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    /**
     *name
     */
    const NAME = 'name';
    /**
     *description
     */
    const DESCRIPTION = 'description';
    /**
     *start time
     */
    const START_TIME = 'start_time';
    /**
     *end time
     */
    const END_TIME = 'end_time';
    /**
     *status
     */
    const STATUS = 'status';
    /**
     *assign person
     */
    const ASSIGN_PERSON = 'assign_person';
    /**
     *task id
     */
    const TASK_ID = 'task_id';


    /**
     * Get task_id
     * @return string|null
     */
    public function getTaskId();

    /**
     * Set task_id
     * @param string $taskId
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setTaskId($taskId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Pronko\Task\Api\Data\TaskExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Pronko\Task\Api\Data\TaskExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Pronko\Task\Api\Data\TaskExtensionInterface $extensionAttributes
    );

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setDescription($description);

    /**
     * Get start_time
     * @return string|null
     */
    public function getStartTime();

    /**
     * Set start_time
     * @param string $startTime
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setStartTime($startTime);

    /**
     * Get end_time
     * @return string|null
     */
    public function getEndTime();

    /**
     * Set end_time
     * @param string $endTime
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setEndTime($endTime);

    /**
     * Get assign_person
     * @return string|null
     */
    public function getAssignPerson();

    /**
     * Set assign_person
     * @param string $assignPerson
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setAssignPerson($assignPerson);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setStatus($status);
}
