<?php
// src/Controller/ArticleController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityRepository;


class StudentController extends AbstractController
{
    /*
	* @Route("/")
	* @Route({"GET"})
	*/
	
	private $categoryRepository;

  
	public function index() 
    {
        //return new Response('<html><body>Welcome to Food Order Online !</body></html>');
		return $this->render('student/home.html.twig');
		//return $this->render('student/index.html.twig');
    }
	
	/*public function index()
    {
        /*$companies = [
            'Apple' => '$1.16 trillion USD',
            'Samsung' => '$298.68 billion USD',
            'Microsoft' => '$1.10 trillion USD',
            'Alphabet' => '$878.48 billion USD',
            'Intel Corporation' => '$245.82 billion USD',
            'IBM' => '$120.03 billion USD',
            'Facebook' => '$552.39 billion USD',
            'Hon Hai Precision' => '$38.72 billion USD',
            'Tencent' => '$3.02 trillion USD',
            'Oracle' => '$180.54 billion USD',
        ];

        return $this->render('student/index.html.twig', [
            'categories' => $category,
        ]);
    }*/
}