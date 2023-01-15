<?php

namespace ArmMage\LearningMagento\Model\ResourceModel\View;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\ArmMage\LearningMagento\Model\View::class, \ArmMage\LearningMagento\Model\ResourceModel\View::class);
    }
}
