<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\Notifier\Ui\Component\Listing\Channel;

use Magento\Ui\Component\Listing\Columns\Column;
use MSP\NotifierApi\Api\Data\ChannelInterface;

class Actions extends Column
{
    /**
     * @inheritdoc
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                $id = $item[ChannelInterface::ID];

                $item[$name]['edit'] = [
                    'href' => $this->getContext()->getUrl('msp_notifier/channel/edit', [ChannelInterface::ID => $id]),
                    'label' => __('Edit')
                ];

                $item[$name]['delete'] = [
                    'href' => $this->getContext()->getUrl('msp_notifier/channel/delete', [ChannelInterface::ID => $id]),
                    'label' => __('Delete')
                ];

                $item[$name]['test'] = [
                    'href' => $this->getContext()->getUrl('msp_notifier/channel/test', [ChannelInterface::ID => $id]),
                    'label' => __('Send Test Message')
                ];
            }
        }

        return $dataSource;
    }
}
