<?php

namespace App\Service;

use Doctrine\DBAL\Types\AsciiStringType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\AsciiSlugger;

class GestionJustificatif
{
    private $sacrement;
    private $dernierCulte;
    private $attestation;

    public function __construct(
        $sacrementDirectory, $dernierDirectory, $attestationDirectory
    )
    {
        $this->sacrement = $sacrementDirectory;
        $this->dernierCulte = $dernierDirectory;
        $this->attestation = $attestationDirectory;
    }

    /**
     * @param $form
     * @param object $campeur
     * @return void
     */
    public function pieceJointe($form, object $campeur): void
    {
        $sacrementFile = $form->get('sacrement')->getData();
        if ($sacrementFile){
            $sacrement = $this->upload($sacrementFile, 'sacrement');
            $campeur->setSacrement($sacrement);
        }

        $dernierCulteFile = $form->get('dernierCulte')->getData();
        if ($dernierCulteFile){
            $dernierCulte = $this->upload($dernierCulteFile, 'dernierCulte');
            $campeur->setDernierCulte($dernierCulte);
        }

        $attestationFile = $form->get('attestation')->getData();
        if ($attestationFile){
            $attestation = $this->upload($attestationFile, 'attestation');
            $campeur->setAttestation($attestation);
        }
    }

    /**
     * @param UploadedFile $file
     * @param string $media
     * @return string
     */
    public function upload(UploadedFile $file, string $media): string
    {
        // Initialisation du slug
        $slugify = new AsciiSlugger();

        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugify->slug(strtolower($originalFileName));
        $newFilename = $safeFilename.'-'.Time().'.'.$file->guessExtension();

        try {
            if ($media === 'sacrement') $file->move($this->sacrement, $newFilename);
            elseif ($media === 'dernierCulte') $file->move($this->dernierCulte, $newFilename);
            elseif ($media === 'attestation') $file->move($this->attestation, $newFilename);
            else $file->move($this->attestation, $newFilename);
        } catch (FileException $e){

        }

        return $newFilename;
    }
}