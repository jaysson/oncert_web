<?php
namespace Wicva\Api\Transformers;

/**
 * Class Base
 * @package Wicva\Api\Transformers
 */
abstract class Base
{
    /**
     * Transform a list of items
     *
     * @param $items
     * @return array
     */
    public function collection($items)
    {
        $data = array();
        foreach ($items as $item) {
            if ($transformedItem = $this->collectionItem($item)) {
                $data[] = $transformedItem;
            }
        }
        return $data;
    }

    /**
     * Transform an item, which will be part of collection. By default, we will treat it like a full item.
     *
     * @param $item
     * @return mixed
     */
    public function collectionItem($item)
    {
        return $this->item($item);
    }

    /**
     * Transform a single item
     *
     * @param $item
     * @return mixed
     */
    abstract public function item($item);
}