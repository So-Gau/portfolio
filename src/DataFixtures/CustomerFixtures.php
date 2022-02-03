<?php 

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture 
{
    const CUSTOMERS = [
        [
            'name'=> 'Motorbox',
            'logo'=> 'url',
        ],
        [
            'name'=> 'ManoMano',
            'logo'=> 'url',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CUSTOMERS as $key => $customerData) {  
            $customer = new Customer();  
            $customer->setName($customerData['name']);
            $customer->setLogo($customerData['logo']);  

            $manager->persist($customer);
            $this->addReference('customer_' . $customerData['name'], $customer);
        
        }  
        $manager->flush();
    }
}