<?php

namespace src\controllers;

use trinity\apiResponses\HtmlResponse;
use trinity\contracts\ViewRendererInterface;

class SiteController
{
    /**
     * @param ViewRendererInterface $view
     */
    public function __construct(
        private ViewRendererInterface $view,
    )
    {
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function actionIndex(): HtmlResponse
    {
        $content = $this->view->render(
            'index'
        );

        return new HtmlResponse($content);
    }
}