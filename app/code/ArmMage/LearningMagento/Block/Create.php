<?php

namespace ArmMage\LearningMagento\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context as BackendContext;
use Magento\Framework\View\Element\Template\Context as FrontendContext;

class Create extends Template
{
    /**
     * Construct
     *
     * @param FrontendContext $context
     * @param array $data
     */
    public function __construct(
        BackendContext $context,
        array          $data = []
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('blog/index/create', ['_secure' => true]);
    }
}
