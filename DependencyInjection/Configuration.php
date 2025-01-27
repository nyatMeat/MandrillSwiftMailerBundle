<?php

namespace Accord\MandrillSwiftMailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        if (\method_exists(TreeBuilder::class, 'getRootNode')) {
            $treeBuilder = new TreeBuilder('accord_mandrill_swift_mailer');
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('accord_mandrill_swift_mailer');
        }

        $rootNode
            ->children()
                ->scalarNode('api_key')->isRequired()->end()
            ->end()
            ->children()
                ->scalarNode('async')->defaultFalse()->info('Background sending mode that is optimized for bulk sending')->example(false)->end()
            ->end()
            ->children()
                ->scalarNode('subaccount')->defaultNull()->end()
            ->children()
                ->scalarNode('loggerService')->defaultNull()->end()
            ->end()
        ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
