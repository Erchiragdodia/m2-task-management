<?php
namespace Pronko\Task\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Status
 * @package Pronko\Task\Model\Source
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Status implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Todo'), 'value' => '1'],
            ['label' => __('In Progress'), 'value' => '2'],
            ['label' => __('Done'), 'value' => '3']

    ];

    }
}