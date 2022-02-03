<?php 

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public const SKILLS = [
        [
            'name'=> 'PHP',
            'icon'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png',
        ],
        [
            'name'=> 'Symfony',
            'icon'=> 'https://symfony.com/logos/symfony_black_03.png',
        ],
        [
            'name'=> 'MySql',
            'icon'=> 'https://symfony.com/logos/symfony_black_03.png',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $key => $skillData) {  
            $skill = new Skill();  
            $skill->setName($skillData['name']);
            $skill->setIcon($skillData['icon']);  
                $this->addReference('Skill_' . $skillData['name'], $skill);

            $manager->persist($skill);
        }  

        $manager->flush();
    }
}