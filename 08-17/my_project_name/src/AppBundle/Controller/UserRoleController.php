<?php

namespace AppBundle\Controller;

use AppBundle\Entity\UserRole;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserRoleController extends Controller
{
    /**
     * @Route("/user-roles", name="user_roles_page")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user_roles_repository = $em->getRepository(UserRole::class);
        $roles = $user_roles_repository->findBy([], ['code' => 'asc'], 10, 0);

        var_dump($roles);
        exit;

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

}
