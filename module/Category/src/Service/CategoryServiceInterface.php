<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:23
 */

namespace Category\Service;


use Category\Entity\Category;

interface CategoryServiceInterface
{
    public function getAllCategories();

    /**
     * @param int $id
     *
     * @return Category|null
     */
    public function getCategoryById(int $id);
    public function create(Category $category);
    public function edit(Category $category);
    public function delete(Category $category);
}
