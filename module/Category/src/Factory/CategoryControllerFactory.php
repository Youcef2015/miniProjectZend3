<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 14:59
 */
declare(strict_types = 1);


namespace Category\Factory;


use Category\Controller\CategoryController;
use Category\Form\AddCategoryForm;
use Category\Service\CategoryService;
use Interop\Container\ContainerInterface;

class CategoryControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $categoryService = $container->get(CategoryService::class);
        $addCategoryForm = $container->get('FormElementManager')->get(AddCategoryForm::class);

        return new CategoryController($categoryService, $addCategoryForm);
    }
}
