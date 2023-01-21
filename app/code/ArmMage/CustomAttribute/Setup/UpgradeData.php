<?php

namespace ArmMage\CustomAttribute\Setup;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Setup\EavSetup;

/**
 * Class UpgradeData
 */
class UpgradeData implements UpgradeDataInterface
{
    private $eavSetup;
    const CUSTOM_ATTRIBUTE_ARM = 'arm_become_author';

    public function __construct(EavSetup $eavSetup, Config $eavConfig)
    {
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $eavConfig;
    }

    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        if (version_compare($context->getVersion(), "1.0.1", "<")) {
            $setup->startSetup();
            $this->eavSetup->addAttribute(
                Customer::ENTITY,
                self::CUSTOM_ATTRIBUTE_ARM,
                [
                    'label' => 'Become an Author',
                    'type' => 'int',
                    'input' => 'boolean',
                    'default' => '1',
                    'source' => 'ArmMage\CustomAttribute\Model\Config\Customer\Extensionoption',
                    'required' => false,
                    'sort_order' => 30,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'used_in_product_listing' => true,
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'visible_on_front' => true,
                    'visible' => true
                ]
            );
            $customAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, self::CUSTOM_ATTRIBUTE_ARM);
            $customAttribute->setData(
                'used_in_forms',
                ['adminhtml_checkout', 'adminhtml_customer', 'adminhtml_customer_address', 'customer_account_edit', 'customer_address_edit', 'customer_register_address', 'customer_account_create']
            );
            $customAttribute->save();
            $setup->endSetup();
        }
    }
}
