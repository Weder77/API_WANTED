<?php

namespace App\DataFixtures;

use App\Entity\Area;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create all Areas
        $values = array("Village du Pichon Frétillant","Bois de Litneg","Forêt d'Astrub","Bordure de Brâkmar","Cité d'Astrub","Désolation de Sidimote","Cimetière des Torturés","Bordure d'Aerdala","Bordure d'Akwadala","Forêt de Pandala","Bordure de Feudala","Champs de glace","Lac gelé","Forêt des pins perdus","Berceau d'Alma","Larmes d'Ouronigride","Crevasse Perge","Forêt pétrifiée","Crocs de verre","Ruche des Gloursons","Cavernes des Givrefoux","Tourbière nauséabonde","Champ des Ingalsse","Marécages sans fond","Jungle obscure","Salles des Abîmes","Retraite des Éternels","Carrière Aurifère","Creuset des Fortunés","Catacombres","Hauts Ténébreux","Ruelles des Eaux-Suaires","Chemins d'hier","Jour présent","Lendemains incertains","Forêt Sombre","Cirque de Cania","Mont Torrideau","Dents de Pierre","Île de Kartonpath","Salles des Embruns","Tourbière sans fond","Jungle Interdite","Tréfonds des Trithons","Abîme de R'lyugluglu","Vestiges engloutis","Dunes des ossements","Territoire Cacterre","Pyramide Maudite","Route des Roulottes","Hauts des Hurlements","Gisgoul","Nimotopia","Bordure de Terrdala","Caserne du Jour sans fin","Plaines herbeuses","Île du Minotoror","Village de la Canopée","Landes de Cania","Tronc de l'arbre Hakam","Île de Grobe","Caverne des Fungus","Dimension Obscure","Territoire des Porcos","Prairies d'Astrub","Clairière de Brouce Boulgoure","Cimetière","Plaine des Porkass","Îlot de la Couronne","Arche d'Otomaï","Territoire des Dragodindes Sauvages","Chemin du Crâne","Gorge des Vents Hurlants","Forêt enneigée");
        foreach ($values as &$value) {   
            $area = new Area();
            $area->setName($value);
            $manager->persist($area);
        }

        $manager->flush();
    }
}
