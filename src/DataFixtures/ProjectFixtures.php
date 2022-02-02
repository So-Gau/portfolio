<?php 

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture 
{
    const CATEGORIES =  [
        'Action',
        'Aventure',
        'Animation',
        'Fantastique',
        'Horreur',
        'Science fiction'
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categoryName) {  
            $category = new Category();  
            $category->setName($categoryName);  
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);  
        }  
        $manager->flush();
    }
}