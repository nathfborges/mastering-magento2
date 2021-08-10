<?php
namespace CadastroDeUsuario\Core\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Cadastro extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('cadastros','entity_id');
    }
}
