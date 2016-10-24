<?php

namespace Danslo\CacheClear\Plugin;

class CacheClearPlugin
{

    /**
     * Clears a cache type when it becomes invalid.
     *
     * @param \Magento\Framework\App\Cache\TypeListInterface $subject
     * @param callable $proceed
     * @param ...$args
     */
    public function aroundInvalidate(\Magento\Framework\App\Cache\TypeListInterface $subject, callable $proceed, ...$args)
    {
        $proceed(...$args);
        $types = $args[0];
        if (!is_array($types)) {
            $types = [$types];
        }
        foreach ($types as $type) {
            $subject->cleanType($type);
        }
    }
}
