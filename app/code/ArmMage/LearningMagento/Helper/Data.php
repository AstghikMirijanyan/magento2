<?php

namespace ArmMage\LearningMagento\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Helper\Context as Context;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Customer\Model\Context as CustomerContext;
class Data extends AbstractHelper
{
    /**
     * @var HttpContext
     */
    private $httpContext;
    protected $customerRepository;

    public function __construct(
        Context                     $context,
        HttpContext                 $httpContext,
        CustomerRepositoryInterface $customerRepository
    )
    {
        parent::__construct($context);
        $this->httpContext = $httpContext;
        $this->customerRepository = $customerRepository;
    }

    public function isLoggedIn()
    {
        return $this->httpContext->getValue(CustomerContext::CONTEXT_AUTH);
    }

    public function getCustomerId()
    {
        return $this->httpContext->getValue('customer_id');
    }

    public function isArmBecomeAuthor()
    {
        $customer = $this->customerRepository->getById($this->getCustomerId());
        return $customer->getCustomAttribute('arm_become_author');
    }
}
