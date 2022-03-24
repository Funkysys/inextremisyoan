<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use DateTimeInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class ArticleCrudController extends AbstractCrudController
{



    public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('content'),
            ImageField::new('image')
                        ->setBasePath(' images/artciles/')
                        ->setUploadDir('public/asset/images/articles')
                        ->setFormType(FileUploadType::class)
                        ->setUploadedFileNamePattern('[randomhash].[extension]')
            ,
            DateField::new('post_date')->hideOnForm(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['post_date' => 'DESC']);
    }

}
