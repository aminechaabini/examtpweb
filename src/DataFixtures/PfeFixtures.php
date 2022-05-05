<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PfeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pfe = new PFE();
        for($i=0;$i<15;$i++){

            $pfe->setTitre("titre".$i);
            $pfe->setEtudiant("etudiant".$i);
            $pfe->setDesignation("des");
            $e=new Entreprise();
            $e->setDesignation("des".$i);
            $e->addPFE($pfe);
            $pfe->setEntreprise($e);
            $manager->persist($e);
            $manager->persist($pfe);
            $manager->flush();
        }

        // $manager->persist($product);

        $manager->flush();
    }
}
