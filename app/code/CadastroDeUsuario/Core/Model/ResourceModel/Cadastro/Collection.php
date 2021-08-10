<?php
namespace CadastroDeUsuario\Core\Model\ResourceModel\Cadastro;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use CadastroDeUsuario\Core\Model\Cadastro;
use CadastroDeUsuario\Core\Model\ResourceModel\Cadastro as CadastroResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected function _construct()
    {
        $this->_init(Cadastro::class, CadastroResource::class);
    }
}
