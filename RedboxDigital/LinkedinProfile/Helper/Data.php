<?php

namespace RedboxDigital\LinkedinProfile\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $storeManager;
    protected $objectManager;

    const XML_PATH_LINKEDINPROFILE = 'linkedinprofile/general/';



    public function __construct(Context $context,
        ObjectManagerInterface $objectManager,
        StoreManagerInterface $storeManager
    ) {
        $this->objectManager = $objectManager;
        $this->storeManager  = $storeManager;
        parent::__construct($context);
    }

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }


    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_LINKEDINPROFILE . $code, $storeId);
    }

    public function is_enabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_LINKEDINPROFILE . 'enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getOption()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_LINKEDINPROFILE . 'options', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}