<?php

namespace ArmMage\LearningMagento\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Action\Action;

class Create extends Action
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
            $objectManager = ObjectManager::getInstance();
            $model = $objectManager->create('ArmMage\LearningMagento\Model\View');
            $model->addData([
                "title" => $title,
                "description" => $description,
                "status" => $status,
            ]);
            if ($model->save()) {
                $this->messageManager->addSuccessMessage('Blog created !');
            } else {
                $this->messageManager->addErrorMessage('Can\'t save!');
            }
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/blog/');
            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}

