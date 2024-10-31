<?php

namespace App\Service;

use App\Entity\Doyenne;
use App\Entity\Section;
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

    /**
     * @param $str
     * @return string
     */
    public function validForm($str): string
    {
        return htmlspecialchars(stripslashes(trim($str)));
    }

    /**
     * @param object $vicariat
     * @return object|false
     */
    public function codeVicariat(object $vicariat): object|false
    {
        $slug = $this->slug($vicariat->getNom());
        $lastVicariat = $this->allRepositories->getLastVicariat($slug);
        if ($lastVicariat === false) return false;

        $code = (int) $lastVicariat->getCode() + 1;

        $vicariat->setSlug($slug);
        $vicariat->setCode($code);

        return $vicariat;
    }

    public function codeDoyenne(object $doyenne): object|false
    {
        $slug = $this->slug($doyenne->getNom());
        $lastDoyenne = $this->allRepositories->getLastDoyenne($slug);
        if ($lastDoyenne === false) return false;

        $codeVicatariat = $lastDoyenne->getVicariat();
        if (!$codeVicatariat) return false;

        if (!$lastDoyenne) {
            $code = (int) $codeVicatariat->getCode() . '' . 10;
        }else{
            $suffixe = substr($lastDoyenne->getCode(), -2);

            $code = (int)$codeVicatariat->getCode().''.(int) $suffixe + 1;
        }

        $doyenne->setSlug($slug);
        $doyenne->setCode($code);

        return $doyenne;
    }

    public function updateCodeDoyenne(Doyenne $doyenne): void
    {
        $newCode = (int) $doyenne->getVicariat()->getCode().substr($doyenne->getCode(), -2);
        $doyenne->setCode($newCode);
    }

    public function codeSection(Section $section): false|Section
    {
        // Slug
        $slug = $this->slug($section->getParoisse());
        $lastSection = $this->allRepositories->getLastSection($slug);

        // Verifier la disponibilité du doyenné
        $codeDoyenne = $section->getDoyenne();
        if ($lastSection === false || !$codeDoyenne) return false;

        // Gérér le code de section
        $code = !$lastSection
            ? (int)  $codeDoyenne->getCode(). '100'
            : (int) $codeDoyenne->getCode().((int) substr($lastSection->getCode(), -3) + 1);


        // Mise à jour de la section
        $section->setSlug($slug);
        $section->setCode($code);

        return $section;
    }

    public function updateCodeSection(Section $section): void
    {
        $newCode = (int) $section->getDoyenne()->getCode().''.substr($section->getCode(), -3);
        $section->setCode($newCode);
        $section->setSlug($section->getParoisse());
    }
}