<?php 

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECTS = [
        [
            'startDate'=> '27-09-2021',
            'endDate'=> '08-10-2021',
            'picture'=> '/build/images/trees.jpg',
            'description'=>'Réalisation d un projet "programme de la saison" regroupant tous les projets, les hackathon, et l event de la formation.',
            'link'=> 'https://n26n26n26.github.io/project1_season_program/',
        ],
        [
            'startDate'=> '21-10-2021',
            'endDate'=> '19-11-2021',
            'picture'=> 'url',
            'description'=>'Réalisation de projet sur le thème de Sherlock « la petite évasion », site dynamique et responsive avec l’utilisation des bases de données (méthode Merise).',
            'link'=> 'https://evasion.marvincrepin.com/',
        ],
        [
            'startDate'=> '07-12-2021',
            'endDate'=> '28-01-2022',
            'picture'=> 'url',
            'description'=>'MotorBox une application facilitant le suivi d usure 
            et d entretien des pièces de votre moto à l aide d un boîtier relié en Bluetooth',
            'link'=> 'https://github.com/WildCodeSchool/reims-202109-php-project3-motorbox',
        ],
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECTS as $key => $projectData) {  
            $project = new Project();  
            $project->setStartDate(
                new DateTime($projectData['startDate'])
            );
            $project->setEndDate(
                new DateTime($projectData['endDate'])
            );
            $project->setPicture($projectData['picture']);  
            $project->setDescription($projectData['description']);  
            $project->setLink($projectData['link']); 
            
            $project->addSkill($this->getReference('Skill_' . 'PHP'));
            $project->addCustomer($this->getReference('customer_' . 'Motorbox'));
            

            $manager->persist($project);
        }  
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          SkillFixtures::class,
          CustomerFixtures::class,
        ];
    }
}