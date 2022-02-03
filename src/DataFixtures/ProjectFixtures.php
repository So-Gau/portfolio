<?php 

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture 
{
    const PROJECTS = [
        [
            'startDate'=> '06/32/4321',
            'endDate'=> '98/54/4567',
            'picture'=> 'jkdsjkd',
            'description'=>'dsd',
            'link'=> 'htppls',
        ],
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECTS as $key => $projectData) {  
            $project = new Project();  
            $project->setStartDate($projectData['startDate']);
            $project->setEndDate($projectData['endDate']);  
            $project->setPicture($projectData['picture']);  
            $project->setDescription($projectData['description']);  
            $project->setLink($projectData['link']);  

            $manager->persist($project);
        
        }  
        $manager->flush();
    }
}