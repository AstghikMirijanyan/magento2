<?php
namespace ArmMage\CustomAttribute\Model\Config\Customer;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Extensionoption extends AbstractSource
{
    protected $optionFactory;

    public function getAllOptions()
    {
        $this->_options = [];
        $this->_options[] = ['label' => 'Become an Author', 'value' => 'arm_become_author'];
        return $this->_options;
    }


}
