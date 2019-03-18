<?php


namespace Pronko\Task\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * Class InstallSchema
 * @package Pronko\Task\Setup
 * @author  Chirag Dodia <info@codextblog.com>
 * @website http://www.codextblog.com/
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $table_pronko_task_task = $setup->getConnection()->newTable($setup->getTable('pronko_task_task'));

        $table_pronko_task_task->addColumn(
            'task_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_pronko_task_task->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => False],
            'name'
        );

        $table_pronko_task_task->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => False],
            'description'
        );

        $table_pronko_task_task->addColumn(
            'start_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            ['nullable' => False],
            'start_time'
        );

        $table_pronko_task_task->addColumn(
            'end_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            ['nullable' => False],
            'end_time'
        );

        $table_pronko_task_task->addColumn(
            'assign_person',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => False],
            'assign_person'
        );

        $table_pronko_task_task->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['default' => '1','nullable' => False],
            'status'
        );

        $setup->getConnection()->createTable($table_pronko_task_task);
    }
}
