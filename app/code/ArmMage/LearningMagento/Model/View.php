<?php

namespace ArmMage\LearningMagento\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use ArmMage\LearningMagento\Api\Data\ViewInterface;

/**
 * Class File
 * @package ArmMage\LearningMagento\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class View extends AbstractModel implements ViewInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'armMage_blog_view';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ArmMage\LearningMagento\Model\ResourceModel\View');
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::DESCRIPTION, $updatedAt);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }
}
