<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Item>
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    /**
     * @return Item[] Returns an array of Item objects according to $array
     * @param $array : filters for the query
     */
    public function findByFilters($array): array
    {
        $query = $this->createQueryBuilder('item');

        if ($array['category']) {
            $query->innerJoin('item.category','category');
            $query->andWhere('category.label = :category')->setParameter('category', $array['category']);
        }
        if ($array['color']) {
            $query->innerJoin('item.color','color');
            $query->andWhere('color.label = :color')->setParameter('color', $array['color']);
        }
        if ($array['name']) {
            $query->orWhere('item.name LIKE :name')->setParameter('name', '%'.$array['name'].'%');
        }
        if ($array['quantity']) {
            $query->orWhere('item.quantity = :quantity')->setParameter('quantity', $array['quantity']);
        }

        return $query
            ->orderBy('item.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Item[] Returns an array of Item objects according to $array and $offset
     * @param $array : filters for the query
     * @param $offset : value of the offset for the query
     */
    public function findByFiltersAndLimit($array,$offset): array
    {
        $query = $this->createQueryBuilder('item');

        if ($array['category']) {
            $query->innerJoin('item.category','category');
            $query->andWhere('category.label = :category')->setParameter('category', $array['category']);
        }
        if ($array['color']) {
            $query->innerJoin('item.color','color');
            $query->andWhere('color.label = :color')->setParameter('color', $array['color']);
        }
        if ($array['name']) {
            $query->orWhere('item.name LIKE :name')->setParameter('name', '%'.$array['name'].'%');
        }
        if ($array['quantity']) {
            $query->orWhere('item.quantity = :quantity')->setParameter('quantity', $array['quantity']);
        }

        return $query
            ->orderBy('item.name', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults(2)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Paginator Returns a paginator of Item objects according to $array and $offset
     * @param $array : filters for the query
     * @param $offset : value of the offset for the query
     */
    public function findByFiltersAndLimitWithPaginator($array,$offset) : Paginator
    {
        $query = $this->createQueryBuilder('item');

        if ($array['category']) {
            $query->innerJoin('item.category','category');
            $query->andWhere('category.label = :category')->setParameter('category', $array['category']);
        }
        if ($array['color']) {
            $query->innerJoin('item.color','color');
            $query->andWhere('color.label = :color')->setParameter('color', $array['color']);
        }
        if ($array['name']) {
            $query->orWhere('item.name LIKE :name')->setParameter('name', '%'.$array['name'].'%');
        }
        if ($array['quantity']) {
            $query->orWhere('item.quantity = :quantity')->setParameter('quantity', $array['quantity']);
        }

        $query
            ->orderBy('item.name', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults(2);

        return new Paginator($query, fetchJoinCollection: true);
    }

//    /**
//     * @return Item[] Returns an array of Item objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Item
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
