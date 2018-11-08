<?php

namespace App\Repository;

use App\Entity\ProgrammingLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProgrammingLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgrammingLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgrammingLanguage[]    findAll()
 * @method ProgrammingLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgrammingLanguageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProgrammingLanguage::class);
    }
    
    /*metodu findKnown, která bude vracet všechny programovací jazyky, které mají ve sloupci testBoolean hodnotu true.*/
   
   /**
    * @return ProgrammingLanguage[] Returns an array of ProgrammingLanguage objects
    */
   
   public function findKnown()
   {
       return $this->createQueryBuilder('p')
            ->andWhere('p.testBoolean = false')
            ->orderBy('p.testString', 'ASC')
            ->getQuery()
            ->getResult();
   }
    
    
   /*
    public function findKnown()
    {
        return $this->findBy(
            ['testBoolean' => false],
            ['testString' => 'ASC']
        ); 
    }
    */
//    /**
//     * @return ProgrammingLanguage[] Returns an array of ProgrammingLanguage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProgrammingLanguage
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
