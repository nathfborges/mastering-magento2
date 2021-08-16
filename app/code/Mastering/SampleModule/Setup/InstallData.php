<?php


namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->insert(
                $setup->getTable('mastering_sample_item'),
                [
                    'item' => 'Escova de Dentes',
                    'peso' => '50',
                    'codigo_produto' =>'45821',
                    'estoque' => 21
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('mastering_sample_item'),
                [
                    'item' => 'Pasta de dente',
                    'peso' => '90',
                    'codigo_produto' =>'78962',
                    'estoque' => 50
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('mastering_sample_item'),
                [
                    'item' => 'Sabonete',
                    'peso' => '100',
                    'codigo_produto' =>'789524',
                    'estoque' => 100
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('mastering_sample_item'),
                [
                    'item' => 'Shampoo',
                    'peso' => '200',
                    'codigo_produto' =>'789523',
                    'estoque' => 80
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('mastering_sample_item'),
                [
                    'item' => 'Condicionador',
                    'peso' => '200',
                    'codigo_produto' =>'789624',
                    'estoque' => 200
                ]
            );
        }

        $setup->endSetup();
    }
}
