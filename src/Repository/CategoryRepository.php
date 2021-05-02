<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    // /**
    //  * @return Category[] Returns an array of Category objects
    //  */
   
    public function findAllCategory()
	{
	    
        return $this->createQueryBuilder('u')
		      //->select('u.id,u.name')
              //->orderBy('u.name', 'ASC')
              ->getQuery()
              ->getResult();
    
	    /*$query->createQueryBuilder()
		->select('p.id','p.name', 'bc.xyz', 'cp.xyz')
		->from('entity','p')
		->innerJoin('p.customer', 'bc')
		->innerJoin('bc.person', 'cp');*/
	}
   
	/*public function findAllCategory()
    {
       return $this->createQueryBuilder('u')
		    
            ->orderBy('u.name', 'ASC')
            ->getQuery()
            ->getResult();
    
	
	  
	}*/
    /*
    public function findOneBySomeField($value): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
	
	public function findAllEmailAlphabetical()
    {
        return $this->createQueryBuilder('u')
            ->orderBy('u.email', 'ASC')
            ->getQuery()
            ->execute()
        ;
    }
    */
}
