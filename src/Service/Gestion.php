<?php

namespace App\Service;

use Symfony\Component\String\AbstractUnicodeString;
use Symfony\Component\String\Slugger\AsciiSlugger;

class Gestion
{
    public function __construct(
        private AllRepositories $allRepositories
    )
    {

    }

    public function getCampeurSlug($campeur)
    {
        $slug  = $this->slug(
            $campeur->getNom().'-'.$campeur->getPrenoms().'-'.$campeur->getTelephone()
        );

        $verification  = $this->allRepositories->findOneCampeur($slug);
        if ($verification){
            return false;
        }

        return $campeur->setSlug($slug);
    }

    /**
     * @param $vicariat
     * @return string
     */
    public function matricule(int $doyenne): string
    {
        $doyenneEntity = $this->allRepositories->getDoyenne($doyenne); //return $doyenneEntity;

        do{
            $nombreAleatoire = random_int(1000,9999);

            $lettreAleatoire = chr(rand(65,90));

            $matricule = $doyenneEntity->getCode().$nombreAleatoire.$lettreAleatoire;

            $verif = $this->allRepositories->getCampeurByMatricule($matricule);
        } while($verif);

        return $matricule;
    }

    /**
     * Formattage du slug
     *
     * @param string $string
     * @return AbstractUnicodeString
     */
    public function slug(string $string): AbstractUnicodeString
    {
        return (new AsciiSlugger())->slug(strtolower($string));
    }
}