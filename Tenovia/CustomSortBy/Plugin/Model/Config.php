<?php
namespace Tenovia\CustomSortBy\Plugin\Model;

class Config
{
    /**
     * Adding custom options and changing labels
     *
     * @param \Magento\Catalog\Model\Config $catalogConfig
     * @param [] $options
     * @return []
     */
    public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $options)
    {
        //Remove default sorting options
        unset($options['position']);
        unset($options['name']);
        unset($options['price']);

        //Change label of default sorting options if needed
        $options['position'] = __('Relevance');

        //New sorting options
        $options['price_asc'] = __('Price Low - High');
        $options['price_desc'] = __('Price High - Low');
        $options['newest'] = __('Most Recent First');
        $options['oldest'] = __('Most Recent Last');
        $options['name_az'] = __('Alphabatical A - Z');
        $options['name_za'] = __('Alphabatical Z - A');

        return $options;
    }
}