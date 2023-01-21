<?php

namespace ArmMage\CustomAttribute\Setup;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
class InstallData implements InstallDataInterface
{
    private $eavSetup;
    const CUSTOM_ATTRIBUTE_ARM = 'arm_become_author';

    public function __construct(EavSetup $eavSetup, Config $eavConfig)
    {
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $eavConfig;
    }


    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
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
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'used_in_product_listing' => true,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'visible_on_front' => true,
                'visible' => true,
                'user_defined' => true,
                'position' => 10,
                'system' => 0,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_html_allowed_on_front' => true,
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



