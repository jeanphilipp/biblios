<?php

namespace App\Tests\Entity;

use App\Entity\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testSetAndGetName(): void
    {
        $author = new Author();
        $author->setName('Jean-Michel Dupont');

        $this->assertSame('Jean-Michel Dupont', $author->getName());
    }

    public function testSetAndGetDates(): void
    {
        $author = new Author();

        $birth = new \DateTimeImmutable('1970-01-01');
        $death = new \DateTimeImmutable('2020-01-01');

        $author->setDateOfBirth($birth);
        $author->setDateOfDeath($death);

        $this->assertSame($birth, $author->getDateOfBirth());
        $this->assertSame($death, $author->getDateOfDeath());
    }

    public function testAddBook(): void
    {
        $author = new Author();

        $book = $this->createMock(\App\Entity\Book::class);

        $author->addBook($book);

        $this->assertTrue($author->getBooks()->contains($book));
    }
}
