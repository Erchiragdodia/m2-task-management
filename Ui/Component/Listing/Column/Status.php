<?php


namespace Pronko\Task\Ui\Component\Listing\Column;


/**
 * Class Status
 * @package Pronko\Task\Ui\Component\Listing\Column
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Status extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {

            foreach ($dataSource['data']['items'] as & $item) {

                if ($item['status'] == 1)
                    $item['status'] = 'Todo';
                elseif ($item['status'] == 2)
                    $item['status'] = 'In Progress';
                elseif ($item['status'] == 3)
                    $item['status'] = 'Done';

            }

            return parent::prepareDataSource($dataSource);
        }

    }
}