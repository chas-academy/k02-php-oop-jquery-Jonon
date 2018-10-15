<?php declare(strict_types=1);

namespace Bookstore\Controllers;

use Bookstore\Exceptions\DbException;
use Bookstore\Exceptions\NotFoundException;
use Bookstore\Models\BookModel;

class BookController extends AbstractController
{
    const PAGE_LENGTH = 10;

    public function getAllWithPage($page): string
    {
        $page = (int)$page;
        $bookModel = new BookModel();

        $books = $bookModel->getAll($page, self::PAGE_LENGTH);

        $properties = [
            'books' => $books,
            'currentPage' => $page,
            'lastPage' => count($books) < self::PAGE_LENGTH
        ];
        return $this->render('views/books.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function get(int $bookId): string
    {
        $bookModel = new BookModel();

        try {
            $book = $bookModel->get($bookId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Book not found!'];
            return $this->render('views/error.php', $properties);
        }

        $properties = ['book' => $book];
        return $this->render('views/book.php', $properties);
    }

    public function search(): string
    {
        $title = $this->request->getParams()->getString('title');
        $author = $this->request->getParams()->getString('author');

        $bookModel = new BookModel();
        $books = $bookModel->search($title, $author);

        $properties = [
            'books' => $books,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/books.php', $properties);
    }

    public function getByUser(): string
    {
        $bookModel = new BookModel();

        $books = $bookModel->getByUser($this->customerId);

        $properties = [
            'books' => $books,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/books.php', $properties);
    }

    public function borrow(int $bookId): string
    {
        $bookModel = new BookModel();

        try {
            $book = $bookModel->get($bookId);
        } catch (NotFoundException $e) {
            $params = ['errorMessage' => 'Book not found.'];
            return $this->render('views/error.php', $params);
        }

        if (!$book->getCopy()) {
            $params = ['errorMessage' => 'There are no copies left.'];
            return $this->render('views/error.php', $params);
        }

        try {
            $bookModel->borrow($book, $this->customerId);
        } catch (DbException $e) {
            $params = ['errorMessage' => 'Error borrowing book.'];
            return $this->render('views/error.php', $params);
        }

        return $this->getByUser();
    }

    public function returnBook(int $bookId): string
    {
        $bookModel = new BookModel();

        try {
            $book = $bookModel->get($bookId);
        } catch (NotFoundException $e) {
            $params = ['errorMessage' => 'Book not found.'];
            return $this->render('views/error.php', $params);
        }

        $book->addCopy();

        try {
            $bookModel->returnBook($book, $this->customerId);
        } catch (DbException $e) {
            $params = ['errorMessage' => 'Error borrowing book.'];
            return $this->render('views/error.php', $params);
        }

        return $this->getByUser();
    }
}
