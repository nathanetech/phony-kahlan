<?php

namespace Eloquent\Phony\Kahlan;

use Eloquent\Phony\Matcher\Matchable;
use Eloquent\Phony\Matcher\MatcherDriver;

/**
 * A matcher driver for Kahlan constraints.
 */
class KahlanMatcherDriver implements MatcherDriver
{
    /**
     * Construct a new Kahlan matcher driver.
     *
     * @param KahlanMatcherDescriber $describer The describer to use.
     */
    public function __construct(KahlanMatcherDescriber $describer)
    {
        $this->describer = $describer;
    }

    /**
     * Returns true if this matcher driver's classes or interfaces exist.
     *
     * @return bool True if available.
     */
    public function isAvailable()
    {
        return class_exists('Kahlan\Arg');
    }

    /**
     * Get the supported matcher class names.
     *
     * @return array<string> The matcher class names.
     */
    public function matcherClassNames()
    {
        return ['Kahlan\Arg'];
    }

    /**
     * Wrap the supplied third party matcher.
     *
     * @param object $matcher The matcher to wrap.
     *
     * @return Matchable The wrapped matcher.
     */
    public function wrapMatcher($matcher)
    {
        return new KahlanMatcher($matcher, $this->describer);
    }

    private $describer;
}