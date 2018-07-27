<?php
namespace Tenovia\CustomSortBy\Plugin\Product\ProductList;

class Toolbar
{
    /**
    * Plugin
    *
    * @param \Magento\Catalog\Block\Product\ProductList\Toolbar $subject
    * @param \Closure $proceed
    * @param \Magento\Framework\Data\Collection $collection
    * @return \Magento\Catalog\Block\Product\ProductList\Toolbar
    */
    public function aroundSetCollection(
        \Magento\Catalog\Block\Product\ProductList\Toolbar $toolbar,
        \Closure $proceed,
        $collection
    ) {
        $this->_collection = $collection;
        $currentOrder = $toolbar->getCurrentOrder();
        $currentDirection = $toolbar->getCurrentDirection();
        $result = $proceed($collection);

        if ($currentOrder) {
            switch ($currentOrder) {

            case 'newest':
                $this->_collection
                    ->getSelect()
                    ->order('e.created_at DESC');
            break;

            case 'oldest':
                $this->_collection
                    ->getSelect()
                    ->order('e.created_at ASC');

            break;

            case 'price_desc':
                $this->_collection
                    ->getSelect()
                    ->order('price_index.min_price DESC');
            break;

            case 'price_asc':
                $this->_collection
                    ->getSelect()
                    ->order('price_index.min_price ASC');
            break;

            case 'name_az':
                // $this->_collection->addAttributeToSort(
                // $currentOrder,
                // $currentDirection
                // )->addAttributeToSort('name', $currentDirection);
             $this->_collection->setOrder('name', 'asc');
            break;

            case 'name_za':
                $this->_collection->setOrder('name', 'desc');
            break;

            default:        
                $this->_collection
                    ->setOrder($currentOrder, $currentDirection);
            break;

            }
        }
        //var_dump((string) $this->_collection->getSelect()); You can use this to get a list of all the available sort fields
        return $result;
    }
}