<?php

namespace App\Controller\Admin;

use App\Entity\Cellule;
use App\Entity\Membre;
use App\Entity\Competence;
use App\Entity\Departement;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competence::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
