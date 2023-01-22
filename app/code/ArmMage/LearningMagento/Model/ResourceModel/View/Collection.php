<?php

namespace ArmMage\LearningMagento\Model\ResourceModel\View;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use ArmMage\LearningMagento\Model\View as ArmMageModel;
use ArmMage\LearningMagento\Model\ResourceModel\View as ArmMageResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ArmMageModel::class, ArmMageResourceModel::class);
    }
}
