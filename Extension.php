<?php

namespace smtgr15\TwigDebugBar;

class Extension extends \Twig_Extension
{
    public function __construct($assetPath = null)
    {
        $this->debugbar = new \DebugBar\StandardDebugBar();
        $this->renderer = $this->debugbar->getJavascriptRenderer();
        if (!is_null($assetPath)) {
            $this->renderer->setBaseUrl($assetPath);
        }
    }
    public function getDebugBar(){
      return $this->debugbar;
    }
    public function getFunctions()
    {
        return array(
            new \Twig_Function('dbg_message', [$this, 'message']),
            new \Twig_Function('dbg_render', [$this, 'render', ['is_safe' => ['html']]]),
            new \Twig_Function('dbg_renderHead', [$this, 'renderHead', ['is_safe' => ['html']]]),
        );
    }

    public function message($text, $label = info)
    {
        $this->debugbar["messages"]->addMessage($text, $label);
    }

    public function render()
    {
        return $this->renderer->render();
    }

    public function renderHead()
    {
        return $this->renderer->renderHead();
    }

    public function getName()
    {
        return 'debugbar_extension';
    }
}
