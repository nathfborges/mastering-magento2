<?php

namespace CadastroDeUsuario\Core\Model;

use Magento\Framework\Model\AbstractModel;

class Cadastro extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Cadastro::class);
    }
}
