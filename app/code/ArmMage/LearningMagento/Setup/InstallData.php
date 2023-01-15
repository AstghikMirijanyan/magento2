<?php

namespace ArmMage\LearningMagento\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData
 *
 * @package ArmMage\LearningMagento\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * Creates sample articles
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('arm_blog');

        $data = [
            [
                'title' => 'Magento2 learning',
                'description' => 'description of the first blog.',
                'status' => 1
            ],
            [
                'title' => 'Magento2 learning',
                'description' => 'description of the second blog.',
                'status' => 1
            ],
        ];
        $conn->insertMultiple($tableName, $data);
        $setup->endSetup();
    }
}
