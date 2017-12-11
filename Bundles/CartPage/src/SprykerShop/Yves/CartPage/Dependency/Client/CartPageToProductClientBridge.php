<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CartPage\Dependency\Client;

class CartPageToProductClientBridge implements CartPageToProductClientInterface
{
    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     */
    public function __construct($productClient)
    {
        $this->productClient = $productClient;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return array
     */
    public function getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract)
    {
        return $this->productClient->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);
    }

    /**
     * @param array $data
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapStorageProductForCurrentLocale(array $data, array $selectedAttributes = [])
    {
        return $this->productClient->mapStorageProductForCurrentLocale($data, $selectedAttributes);
    }
}
