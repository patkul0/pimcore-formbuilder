<?php

namespace Formbuilder\Controller\Plugin;

class Frontend extends \Zend_Controller_Plugin_Abstract {

    public function preDispatch(\Zend_Controller_Request_Abstract $request)
    {
        parent::preDispatch($request);

        /** @var \Pimcore\Controller\Action\Helper\ViewRenderer $renderer */
        $renderer = \Zend_Controller_Action_HelperBroker::getExistingHelper('ViewRenderer');
        $renderer->initView();

        /** @var \Pimcore\View $view */
        $view = $renderer->view;
        $view->addScriptPath(PIMCORE_PLUGINS_PATH . '/Formbuilder/views/scripts');
        $view->addScriptPath(PIMCORE_PLUGINS_PATH . '/Formbuilder/views/layouts');
        $view->addScriptPath(PIMCORE_WEBSITE_PATH . '/views/scripts/formbuilder');

        $view->headScript()->appendFile('/plugins/Formbuilder/static/js/frontend/formbuilder.js');
        $view->headLink()->appendStylesheet('/plugins/Formbuilder/static/css/formbuilder.css');

    }
}
