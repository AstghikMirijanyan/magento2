<?php

namespace ArmMage\LearningMagento\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package ArmMage\LearningMagento\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * Creates sample articles
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.1.1') < 0
        ) {
            $tableName = $setup->getTable('arm_blog');

            $data = [
                [
                    'title' => 'Upgrated blog Magento2',
                    'description' => 'description of the first post.',
                    'status' => 1
                ],
                [
                    'title' => 'Upgrated blog Magento2',
                    'description' => 'description of the second post.',
                    'status' => 1
                ],
            ];

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
        }
        $setup->endSetup();
    }
}
