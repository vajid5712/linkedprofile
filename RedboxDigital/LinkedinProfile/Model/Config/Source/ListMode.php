<?php

namespace RedboxDigital\LinkedinProfile\Model\Config\Source;

class ListMode implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => 'optional', 'label' => __('Optional')],
    ['value' => 'required', 'label' => __('Required')]
  ];
 }
}