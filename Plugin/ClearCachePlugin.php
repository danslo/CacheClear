<?php

namespace Danslo\CacheClear\Plugin;

class ClearCachePlugin
{

    /**
     * @param \Magento\Framework\App\Cache\TypeListInterface $subject
     * @param callable $proceed
     * @param ...$args
     */
    public function aroundInvalidate(\Magento\Framework\App\Cache\TypeListInterface $subject, callable $proceed, ...$args)
    {
        $proceed(...$args);
        $subject->cleanType($args[0]);
    }
}