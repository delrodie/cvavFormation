<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/notice')]
class NoticeController extends AbstractController
{
    #[Route('/', name: 'app_frontend_notice_index')]
    public function index(): Response
    {
        return $this->render('frontend/notice.html.twig');
    }
}
