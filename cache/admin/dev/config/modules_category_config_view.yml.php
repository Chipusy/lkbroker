<?php
// auto-generated by sfViewConfigHandler
// date: 2010/01/26 18:26:26
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'www.lk-broker.ru / панель администратора', false, false);
  $response->addMeta('language', 'ru', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addJavascript('jquery', '', array ());
  $response->addJavascript('common', '', array ());


