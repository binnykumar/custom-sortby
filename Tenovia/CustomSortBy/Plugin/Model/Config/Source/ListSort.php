<?php

namespace Tenovia\CustomSortBy\Plugin\Model\Config\Source;

class ListSort extends \Magento\Catalog\Model\Config\Source\ListSort {
	public function toOptionArray()
    {
        $options = [];
        $options[] = ['label' => __('Position'), 'value' => 'position'];
        $options[] = ['label' => __('Price Low - High'), 'value' => 'price_asc'];
        $options[] = ['label' => __('Price High - Low'), 'value' => 'price_desc'];
        $options[] = ['label' => __('Most Recent First'), 'value' => 'newest'];
        $options[] = ['label' => __('Most Recent Last'), 'value' => 'oldest'];
        $options[] = ['label' => __('Alphabatical A - Z'), 'value' => 'name_az'];
        $options[] = ['label' => __('Alphabatical Z - A'), 'value' => 'name_za'];
        foreach ($this->_getCatalogConfig()->getAttributesUsedForSortBy() as $attribute) {
            $options[] = ['label' => __($attribute['frontend_label']), 'value' => $attribute['attribute_code']];
        }
        
        return $options;
    }
}