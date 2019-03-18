<?php


namespace Pronko\Task\Model\Data;

use Pronko\Task\Api\Data\TaskInterface;

/**
 * Class Task
 * @package Pronko\Task\Model\Data
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Task extends \Magento\Framework\Api\AbstractExtensibleObject implements TaskInterface
{

    /**
     * Get task_id
     * @return string|null
     */
    public function getTaskId()
    {
        return $this->_get(self::TASK_ID);
    }

    /**
     * Set task_id
     * @param string $taskId
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setTaskId($taskId)
    {
        return $this->setData(self::TASK_ID, $taskId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Pronko\Task\Api\Data\TaskExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Pronko\Task\Api\Data\TaskExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Pronko\Task\Api\Data\TaskExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get start_time
     * @return string|null
     */
    public function getStartTime()
    {
        return $this->_get(self::START_TIME);
    }

    /**
     * Set start_time
     * @param string $startTime
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setStartTime($startTime)
    {
        return $this->setData(self::START_TIME, $startTime);
    }

    /**
     * Get end_time
     * @return string|null
     */
    public function getEndTime()
    {
        return $this->_get(self::END_TIME);
    }

    /**
     * Set end_time
     * @param string $endTime
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setEndTime($endTime)
    {
        return $this->setData(self::END_TIME, $endTime);
    }

    /**
     * Get assign_person
     * @return string|null
     */
    public function getAssignPerson()
    {
        return $this->_get(self::ASSIGN_PERSON);
    }

    /**
     * Set assign_person
     * @param string $assignPerson
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setAssignPerson($assignPerson)
    {
        return $this->setData(self::ASSIGN_PERSON, $assignPerson);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Pronko\Task\Api\Data\TaskInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
