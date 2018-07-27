<?php

namespace Tenovia\CustomSortBy\Plugin\Model\Catalog\Category\Attribute\Source;

class Sortby extends \Magento\Catalog\Model\Category\Attribute\Source\Sortby {
    /**
     * {@inheritdoc}
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [['label' => __('Relevance'), 'value' => 'position']];
            $this->_options[] = ['label' => __('Price Low - High'), 'value' => 'price_asc'];
            $this->_options[] = ['label' => __('Price High - Low'), 'value' => 'price_desc'];
            $this->_options[] = ['label' => __('Most Recent First'), 'value' => 'newest'];
            $this->_options[] = ['label' => __('Most Recent Last'), 'value' => 'oldest'];
            $this->_options[] = ['label' => __('Alphabatical A - Z'), 'value' => 'name_az'];
            $this->_options[] = ['label' => __('Alphabatical Z - A'), 'value' => 'name_za'];
            foreach ($this->_getCatalogConfig()->getAttributesUsedForSortBy() as $attribute) {
                $this->_options[] = [
                    'label' => __($attribute['frontend_label']),
                    'value' => $attribute['attribute_code'],
                ];
            }
        }
        return $this->_options;
    }
}