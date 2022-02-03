<?php 

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class ProjectFixtures extends Fixture 
{
    const PROJECTS = [
        [
            'startDate'=> '01-01-2022',
            'endDate'=> '02-01-2022',
            'picture'=> 'url',
            'description'=>'dsd',
            'link'=> 'https',
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

            $manager->persist($project);
        
        }  
        $manager->flush();
    }
}