<?php

namespace Bookstore\Controllers;

use Bookstore\Exceptions\NotFoundException;
use Bookstore\Models\CustomerModel;

class CustomerController extends AbstractController
{
    public function login(): string
    {
        if (!$this->request->isPost()) {
            return $this->render('views/login.php', []);
        }

        $params = $this->request->getParams();

        if (!$params->has('email')) {
            $params = ['errorMessage' => 'No email provided.'];
            return $this->render('views/login.php', $params);
        }

        $email = $params->getSTring('email');
        $customerModel = new customerModel();

        try {
            $customer = $customerModel->getByEmail($email);
        } catch (NotFoundException $e) {
            $params = ['errorMessage' => 'Email not found'];
            return $this->render('views/login.php', $params);
        }

        setcookie('user', $customer->getId());

        $newController = new BookController($this->request);
        return $newController->getAll();
    }

    public function getAll(): string
    {
        $customerModel = new CustomerModel();

        $customers = $customerModel->getAll();

        $properties = [
            'customers' => $customers
        ];

        return $this->render('views/customers.php', $properties);
    }

    public function get(int $customerId): string
    {
        $customerModel = new customerModel();

        try {
            $customer = $customerModel->get($customerId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Customer not found!'];
            return $this->render('views/customer.php', $properties);
        }

        $properties = ['customer' => $customer];
        return $this->render('views/customer.php', $properties);
    }
}
