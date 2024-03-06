<?php
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(false);
