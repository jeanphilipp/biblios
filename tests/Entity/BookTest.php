<?php

namespace App\Tests\Entity;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testSetAndGetTitle(): void
    {
        $book = new Book();
        $book->setTitle('Le Seigneur des Anneaux');

        $this->assertSame('Le Seigneur des Anneaux', $book->getTitle());
    }

    public function testSetAndGetIsbn(): void
    {
        $book = new Book();
        $book->setIsbn('9783161484100');
        $this->assertSame('9783161484100', $book->getIsbn());
    }

    public function testSetAndGetEditor(): void
    {
        $book = new Book();

        $editor = $this->createMock(\App\Entity\Editor::class);

        $book->setEditor($editor);

        $this->assertSame($editor, $book->getEditor());
    }
}
