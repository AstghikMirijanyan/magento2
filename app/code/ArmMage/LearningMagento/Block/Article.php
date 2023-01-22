<?php

namespace ArmMage\LearningMagento\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use ArmMage\LearningMagento\Model\CurrentDate as CurrentDateTime;
use ArmMage\LearningMagento\Model\ResourceModel\View\CollectionFactory as ViewCollectionFactory;

class Article extends Template
{
    /**
     * CollectionFactory
     * @var null|CollectionFactory
     */
    protected $_viewCollectionFactory = null;
    public $currentDateTime;

    /**
     * Constructor
     *
     * @param Context $context
     * @param ViewCollectionFactory $viewCollectionFactory
     * @param array $data
     */
    public function __construct(
        CurrentDateTime $currentDateTime,
        Context               $context,
        ViewCollectionFactory $viewCollectionFactory,
        array                 $data = []
    )
    {
        $this->_viewCollectionFactory = $viewCollectionFactory;
        $this->currentDateTime = $currentDateTime;
        parent::__construct($context, $data);
    }

    /**
     * @return Create[]
     */
    public function getCollection()
    {
        /** @var ViewCollection $viewCollection */
        $viewCollection = $this->_viewCollectionFactory->create();
        $viewCollection->addFieldToSelect('*')->load();
        return $viewCollection->getItems();
    }
    /**
     * @param Create
     * @return string
     */
    public function getArticleUrl($viewId)
    {
        return $this->getUrl('blog/index/view/' . $viewId, ['_secure' => true]);
    }

    public function getCurrentDate(): string
    {
        return $this->currentDateTime->getDateTime();
    }
}

?>
