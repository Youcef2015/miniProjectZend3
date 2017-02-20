<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 14:57
 */
declare(strict_types = 1);


namespace Category\Controller;


use Category\Form\AddCategoryForm;
use Category\Service\CategoryService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractActionController
{
    /**
     * @var CategoryService $categoryService
     */
    private $categoryService;
    /**
     * @var AddCategoryForm $categoryForm
     */
    private $categoryForm;

    public function __construct(CategoryService $categoryService, AddCategoryForm $categoryForm)
    {
        $this->categoryService = $categoryService;
        $this->categoryForm = $categoryForm;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                'categories' => $this->categoryService->getAllCategories(),
            ]
        );
    }

    public function addAction()
    {
        /**
         * @var \Zend\Http\Request $request
         */
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->categoryForm->setData($request->getPost());

            if ($this->categoryForm->isValid()) {
                $category = $this->categoryForm->getData();
                $this->categoryService->create($category);

                return $this->redirect()->toRoute('category');
            }
        }

        return new ViewModel(
            [
                'form' => $this->categoryForm
            ]
        );
    }

    public function editAction()
    {
        $categoryId = (int) $this->params()->fromRoute('id', 0);
        $category = $this->categoryService->getCategoryById($categoryId);

        if (!$category) {
            return $this->redirect()->toRoute('category', ['action' => 'add']);
        }

        /** @var Request $request */
        $request  = $this->getRequest();
        $this->categoryForm->bind($category);

        if($request->isPost()) {
            $this->categoryForm->setData($request->getPost());

            if($this->categoryForm->isValid()) {
                $category = $this->categoryForm->getData();
                $this->categoryService->edit($category);
                return $this->redirect()->toRoute('category');
            }
        }

        return  new ViewModel(
            [
                'form' => $this->categoryForm,
                'id'   => $category->getId(),
            ]
        );
    }

    public function deleteAction()
    {
        $categoryId = (int)$this->params()->fromRoute('id', 0);
        $category = $this->categoryService->getCategoryById($categoryId);
        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int)$request->getPost('id');
                $category = $this->categoryService->getCategoryById($id);
                $this->categoryService->delete($category);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('category');
        }

        return [
            'id'    => $categoryId,
            'category'  => $category,
        ];
    }
}
