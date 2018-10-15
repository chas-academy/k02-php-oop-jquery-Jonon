<?php

namespace Bookstore\Controllers;

use Bookstore\Core\Request;

abstract class AbstractController
{
    protected $request;
    protected $view;
    protected $customerId;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setCustomerId(int $customerId)
    {
        $this->customerId = $customerId;
    }

    protected function render(string $template, array $params): string
    {
        extract($params);

        ob_start();
        include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.html');
        include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/navigation.html');
        include $template;
        include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html');
        $renderedView = ob_get_clean();
        
        return $renderedView;
    }
}
