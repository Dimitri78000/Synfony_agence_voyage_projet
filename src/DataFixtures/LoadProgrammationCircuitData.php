<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ProgrammationCircuit;
use \DateTime;

class LoadProgrammationCircuitData extends Fixture
{
	public function load(ObjectManager $manager)
	{
		$programmationCircuit = new ProgrammationCircuit();
		$programmationCircuit->setDateDepart(new \DateTime("12-10-2018"));
		$programmationCircuit->setNombrePersonnes('15');
		$programmationCircuit->setPrix('500');
		$programmationCircuit->setCircuit($this->getReference('andalousie-circuit'));
		$manager->persist($programmationCircuit);

		$this->addReference('andalousie-programmationcircuit', $programmationCircuit);

		$programmationCircuit = new ProgrammationCircuit();
		$programmationCircuit->setDateDepart(new \DateTime("10-10-2018"));
		$programmationCircuit->setNombrePersonnes('8');
		$programmationCircuit->setPrix('100');
		$programmationCircuit->setCircuit($this->getReference('idf-circuit'));
		$manager->persist($programmationCircuit);

		$this->addReference('idf-programmationcircuit', $programmationCircuit);

		$manager->flush();
	}

	public function getDependencies()
	{
	    return array(
	        LoadCircuitData::class,
	    );
	}

}
