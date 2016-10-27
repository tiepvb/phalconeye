<?php
/*
  +------------------------------------------------------------------------+
  | PhalconEye CMS                                                         |
  +------------------------------------------------------------------------+
  | Copyright (c) 2013-2016 PhalconEye Team (http://phalconeye.com/)       |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file LICENSE.txt.                             |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconeye.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Author: Ivan Vorontsov <lantian.ivan@gmail.com>                 |
  +------------------------------------------------------------------------+
*/

namespace Engine\Api;

use Engine\Behavior\DIBehavior;
use Phalcon\DI;
use Phalcon\DiInterface;

/**
 * Abstract api.
 *
 * @category  PhalconEye
 * @package   Engine\Api
 * @author    Ivan Vorontsov <lantian.ivan@gmail.com>
 * @copyright 2013-2016 PhalconEye Team
 * @license   New BSD License
 * @link      http://phalconeye.com/
 */
abstract class AbstractApi implements ApiInterface
{
    use DIBehavior {
        DIBehavior::__construct as protected __DIConstruct;
    }

    /**
     * Api arguments.
     *
     * @var array
     */
    private $_arguments;

    /**
     * Create api.
     *
     * @param DiInterface $di        Dependency injection.
     * @param array       $arguments Api arguments.
     */
    public function __construct(DiInterface $di, $arguments)
    {
        $this->__DIConstruct($di);
        $this->_arguments = $arguments;
    }

    /**
     * Get Api call arguments.
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->_arguments;
    }
}