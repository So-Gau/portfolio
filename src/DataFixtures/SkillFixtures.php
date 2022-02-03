<?php 

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture 
{
    const SKILLS = [
        [
            'name'=> 'PHP',
            'icon'=> 'url',
        ],
        [
            'name'=> 'Symfony',
            'icon'=> 'url',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $key => $skillData) {  
            $skill = new Skill();  
            $skill->setName($skillData['name']);
            $skill->setIcon($skillData['icon']);  

            $manager->persist($skill);
        
        }  
        $manager->flush();
    }
}