<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CustomerPage\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use SprykerShop\Yves\CustomerPage\CustomerPageFactory;

/**
 * Class CustomerTwigServiceProvider
 *
 * @method CustomerPageFactory getFactory()
 */
class CustomerTwigFunctionServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app['twig'] = $app->share(
            $app->extend('twig', function (\Twig_Environment $twig) use ($app) {
                return $this->registerCustomerTwigFunction($twig);
            })
        );
    }

    /**
     * @param \Twig_Environment $twig
     *
     * @return \Twig_Environment
     */
    protected function registerCustomerTwigFunction(\Twig_Environment $twig)
    {
        $twig->addFunction('getUsername',
            new \Twig_SimpleFunction('getUsername', function () {
                if (!$this->getFactory()->getCustomerClient()->isLoggedIn()) {
                    return null;
                }

                return $this->getFactory()->getCustomerClient()->getCustomer()->getEmail();
            })
        );

        $twig->addFunction('isLoggedIn',
            new \Twig_SimpleFunction('isLoggedIn', function () {
                return $this->getFactory()->getCustomerClient()->isLoggedIn();
            })
        );

        return $twig;
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }
}
