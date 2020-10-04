<?php

namespace App\DataFixtures;

use App\Entity\Agent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AgentFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++)
        {
            $agent = new  Agent();
            $agent->setFirstName($faker->firstName())
                ->setLastName($faker->lastName)
                ->setGenderSex($faker->numberBetween(0,1))
            ;
            $manager->persist($agent);
        }
        $manager->flush();
    }
}
