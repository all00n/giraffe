<?php
namespace App\Repository;
use App\Entity\Adverts;
use App\Entity\User;

class AdvertsRepository extends \Doctrine\ORM\EntityRepository {

    public function findAdverts($page = 1, $limit = 5) {
        $query = $this->createQueryBuilder('a')
        ->select('a.id','a.title','a.description','a.datetime','u.username')
        
        ->join('App:User', 'u', 'WITH', 'u.id = a.author_id')
        ->orderBy('a.id', 'DESC')
        ->setMaxResults($limit)->setFirstResult(($limit * $page ) - $limit);
        return $query->getQuery()->getResult();
    }
    
    public function countAdvert() {
        $em = $this->createQueryBuilder('p')->select('count(p.id)');
        $res = $em->getQuery()->getOneOrNullResult();
        return $res ? array_shift($res) : 0;
    }
    
    public function countAdvertList($user_id) {
        $em = $this->createQueryBuilder('p')
                ->select('count(p.id)')
                ->where('p.author_id = :author_id')
                ->setParameter('author_id', $user_id);
        $res = $em->getQuery()->getOneOrNullResult();
        return $res ? array_shift($res) : 0;
    }
    
    public function getList($page = 1, $limit = 5, $user_id){

        $query = $this->createQueryBuilder('a')
        ->select('a.id','a.title','a.description','a.datetime','u.username')
        ->join('App:User', 'u', 'WITH', 'u.id = a.author_id')
        ->orderBy('a.id', 'DESC')
        ->where('a.author_id = :author_id')
        ->setParameter('author_id', $user_id)
        ->setMaxResults($limit)->setFirstResult(($limit * $page ) - $limit);
        return $query->getQuery()->getResult();
    }
    
    public function addAdvert($data,$author_id){
        $em = $this->getEntityManager();
        
        $Adverts = new Adverts();
        
        $Adverts->setTitle($data['title']);
        $Adverts->setDescription($data['description']);
        $Adverts->setAuthor_id($author_id);
        $Adverts->setDatetime(new \DateTime('now'));
        
        $em->persist($Adverts);
        $em->flush();
        
        return $Adverts;
    }
}
