<?php

namespace ArmMage\LearningMagento\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class View extends AbstractDb
{
    private const TABLE_NAME = 'arm_blog';
    private const PRIMARY_KEY = 'entity_id';

    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}
