<?php

/**
 * Copyright © Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Amazon\Alexa\Model\Config\Form;

use Magento\Framework\Data\Form\Element\AbstractElement;

class Note extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @var \Amazon\Alexa\Model\AlexaConfig
     */
    private $alexaConfig;

    public function __construct(
        \Amazon\Alexa\Model\AlexaConfig $alexaConfig,
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        $this->alexaConfig = $alexaConfig;
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _renderScopeLabel(AbstractElement $element)
    {
        return '';
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _renderValue(AbstractElement $element)
    {
        $html = '<td class="value">';
        if (!$this->alexaConfig->getAlexaPrivateKey() || !$this->alexaConfig->getAlexaPublicKeyId()) {
            $html .= __('Log in to Seller Central. Navigate to Integration Central, to access the below required keys');
        }
        $html .= '</td>';
        return $html;
    }
}
