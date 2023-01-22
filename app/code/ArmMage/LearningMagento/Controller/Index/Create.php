<?php

namespace ArmMage\LearningMagento\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Create extends \Magento\Framework\App\Action\Action
{
    /**
     * Blog create action
     *
     * @return void
     */
    public function execute()
    {
        $post = (array)$this->getRequest()->getPost();

        if (!empty($post)) {
            $title = $post['title'];
            $description = $post['description'];
            $status = $post['status'];
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $model = $objectManager->create('ArmMage\LearningMagento\Model\ResourceModel\View');

            $this->messageManager->addSuccessMessage('Blog created !');
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/blog/');

            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}

