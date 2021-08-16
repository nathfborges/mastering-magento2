<?php

namespace CadastroDeUsuario\Core\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '2.0.3', '<')) {
            $setup->getConnection()->insert(
                $setup->getTable('cadastros'),
                [
                    'nome' => 'Nathália Ferreira Borges',
                    'nome_de_usuario' => 'nathfborges',
                    'email' => 'nathi-borges@hotmail.com',
                    'idade' => 21
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('cadastros'),
                [
                    'nome' => 'José Carlos',
                    'nome_de_usuario' => 'jcpborges',
                    'email' => 'jcpb.borges@hotmail.com',
                    'genero' => 'M'
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('cadastros'),
                [
                    'nome' => 'Fernanda',
                    'nome_de_usuario' => 'ffna23',
                    'email' => 'ffna23@hotmail.com',
                    'genero' => 'F'
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('cadastros'),
                [
                    'nome' => 'Clevenice',
                    'nome_de_usuario' => 'clevenice123',
                    'email' => 'clevenice.ferreira@hotmail.com',
                    'genero' => 'F'
                ]
            );

            $setup->getConnection()->insert(
                $setup->getTable('cadastros'),
                [
                    'nome' => 'Lilian',
                    'nome_de_usuario' => 'lilian_araujo',
                    'email' => 'lilian@hotmail.com',
                    'genero' => 'F'
                ]
            );
        }
        $setup->endSetup();
    }
}
