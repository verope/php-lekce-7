<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book/listing")
 */
class BookListingController extends AbstractController

/*
 * century, která zobrazí knihy po stoletích v tabulkách 
 * (výsledkem tedy budou tedy 3 tabulky: 
 *      před rokem 1900, 
 *      1901-2000, 
 *      2000 - současnost)
 */
{
    /**
     * @Route("/century", name="book_listing_century", methods="GET")
     */
    public function byCentury(BookRepository $bookRepository): Response
    {
        return $this->render('book/century.html.twig', 
        ['books_19' => $bookRepository->findByCentury(0,1900),
         'books_20' => $bookRepository->findByCentury(1900,2000),
         'books_21' => $bookRepository->findByCentury(2000,3000)
        ]);
    }

    /**
     * @Route("/price", name="book_listing_price", methods="GET")
     */
    public function byPrice(BookRepository $bookRepository): Response
    {
        return $this->render('book/price.html.twig', 
        ['booksP' => $bookRepository->findBy([],['price' => 'ASC'])
        ]);
    }
    
    /**
     * @Route("/newbooks", name="book_listing_newbooks", methods="GET")
     */
    public function newbooks(BookRepository $bookRepository): Response
    {
        return $this->render('book/newbooks.html.twig', 
        ['booksN' => $bookRepository->findNew()
        ]);
    }    
    
        /**
     * @Route("/author", name="book_listing_author", methods="GET")
     */
    public function author(BookRepository $bookRepository): Response
    {
        return $this->render('book/author.html.twig', 
        ['booksA' => $bookRepository->findAll([],['author' => 'ASC'])
        ]);
    } 

}
