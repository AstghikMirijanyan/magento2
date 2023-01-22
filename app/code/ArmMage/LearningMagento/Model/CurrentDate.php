<?php

namespace ArmMage\LearningMagento\Model;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class CurrentDate extends AbstractHelper
{
    protected $_date;

    public function __construct(Context $context, TimezoneInterface $date)
    {
        $this->_date = $date;
        parent::__construct($context);
    }

    public function getDateTime()
    {
        return $this->_date->date()->format('Y-m-d H:i:s');
    }
}
