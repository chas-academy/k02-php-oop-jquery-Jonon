<?php

namespace TwitterClone\Controllers;

use TwitterClone\Core\Request;

abstract class AbstractController
{
    protected $request;
    protected $view;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function isAuthenticated(): bool
    {
        return isset($_SESSION['user']);
    }

    protected function getAuthenticatedUser(): string
    {
        return $_SESSION['user']->getUsername();
    }

    protected function getAuthenticatedUserId(): int
    {
        return $_SESSION['user']->getId();
    }

    protected function redirect(string $path): string
    {
        header("Location: $path ");
    }

    protected function render(string $template, array $params): string
    {
        extract($params);
        
        ob_start();
        include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.html');
        include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/navigation.php');
        include $template;
        include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html');
        $renderedView = ob_get_clean();
        
        return $renderedView;
    }
}
