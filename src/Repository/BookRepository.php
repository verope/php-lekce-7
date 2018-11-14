<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Book::class);
    }

//    /**
//     * @return Book[] Returns an array of Book objects
//     */
    
    public function findByCentury(int $minYear, int $maxYear)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.publishedYear > :minYear')
            ->andWhere('c.publishedYear <= :maxYear')
            ->setParameter('minYear', $minYear)
            ->setParameter('maxYear', $maxYear)
            ->orderBy('c.publishedYear', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    /* chtela jsem to udelat dynamicky, ale nevim, jak udelat z integeru datum nebo z data integer - funkce year() by se musela nastavovat v doctrine a to mi neslo */
   
    public function findNew()
    {
        return $this->createQueryBuilder('n')
            ->andWhere("n.publishedYear >= 2016")
            ->orderBy('n.publishedYear', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
