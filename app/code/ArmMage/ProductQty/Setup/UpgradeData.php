<?php

namespace ArmMage\ProductQty\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Config;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

/**
 * Class UpgradeData
 */
class UpgradeData implements UpgradeDataInterface
{
    private $eavSetup;
    const CUSTOM_ATTRIBUTE_ARM = 'arm_product_min_qty';

    public function __construct(EavSetup $eavSetup, Config $eavConfig)
    {
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $eavConfig;
    }

    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface   $context
    )
    {
        if (version_compare($context->getVersion(), "1.0.1", "<")) {
            $setup->startSetup();
            $this->eavSetup->addAttribute(
                Product::ENTITY,
                self::CUSTOM_ATTRIBUTE_ARM,
                [
                    'label' => 'Product min qty',
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => ''
                ]
            );
            $setup->endSetup();
        }
    }
}
