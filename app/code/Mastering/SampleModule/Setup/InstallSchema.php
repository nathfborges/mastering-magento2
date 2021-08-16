<?php

namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('mastering_sample_item')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item ID'
        )->addColumn(
            'item',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Nome do item'
        )->addColumn(
            'peso',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Peso do produto'
        )->addColumn(
            'codigo_produto',
            Table::TYPE_TEXT,
            50,
            ['nullable' => false],
            'Código do item'
        )->addColumn(
            'estoque',
            Table::TYPE_INTEGER,
            3,
            ['nullable' => false],
            'Quantidade de itens no estoque'
        )->addIndex(
            $setup->getIdxName('mastering_sample_item', ['item']),
            ['item']
        )->setComment(
            'Sample Items'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
