<?php

namespace App\Form;

use App\Entity\Entity;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EntityType extends AbstractType
{
    
	private $categoryRepository;
	
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

	
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    
		$category = $this->categoryRepository->findAllCategory();
		$arrdata = array_column($category, 'name', 'id');
       
		$choices = array_flip($arrdata);
	
	
        $builder
            ->add('name')
            ->add('price')
            ->add('qty')
			->add('category', ChoiceType::class, 
			    array('choices'=> $category,
			          //'choice_label' => function ($choices, $key, $value) {return $key;},
			   ))
			/*->add('category', ChoiceType::class, 
			    array('choices'=> $choices,
				'choices_as_values' => true,))
			*/
			   
	    ;	
	}
	
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entity::class,
        ]);
    }
}