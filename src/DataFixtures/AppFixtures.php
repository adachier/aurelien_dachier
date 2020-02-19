<?php

namespace App\DataFixtures;

use App\Entity\Drone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $drone = new Drone();
        $drone
            -> setNom('Fat Shark 101')
            -> setMarque('Fat Shark')
            -> setImage('https://dyw7ncnq1en5l.cloudfront.net/optim/produits/3207/50927/fat-shark-101_a341770e2c496698__450_400.webp')
            -> setPrix(395,76)
            -> setAutonomie(4)
            -> setPresentation("Le Fat Shark 101 se compose de trois éléments principaux : le drone Shark, le masque FPV Recon et la radiocommande Fat Shark spécifique. S'y ajoutent 2 batteries avec un chargeur USB, 2 paires d'hélices et 2 moteurs de rechange, ainsi que 2 anneaux souples avec leur support pour se créer un petit parcours de course.");
        $manager -> persist($drone);
        $drone = new Drone();
        $manager->persist($drone);

        $manager->flush();

        $drone2 = new Drone();
        $drone2
            -> setNom('Hubsan FPV X4 Plus (H107D+)')
            -> setMarque('Hubsan')
            -> setImage('https://dyw7ncnq1en5l.cloudfront.net/optim/produits/1811/48945/hubsan-fpv-x4-plus-h107d_811102b34569b403__450_400.webp')
            -> setPrix(69,99)
            -> setAutonomie(6)
            -> setPresentation("Parmi les modèles de la série H107 du fabricant chinois Hubsan, le H107D+ — aussi appelé X4 Plus FPV — a la particularité de fournir un retour vidéo en temps réel à l'utilisateur, permettant un pilotage en immersion via l'écran de sa radiocommande. Plutôt destiné aux débutants souhaitant apprendre les rudiments du pilotage, il demande toutefois un peu de patience pour l'apprivoiser. C'est que malgré ses airs dociles, la bête a ses accès de colère...");
        $manager -> persist($drone2);
        $drone2 = new Drone();
        $manager->persist($drone2);

        $manager->flush();

    }
}
