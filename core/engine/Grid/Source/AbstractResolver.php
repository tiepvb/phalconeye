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

namespace Engine\Grid\Source;

use Engine\Behavior\DIBehavior;
use Engine\Grid\GridInterface;
use Phalcon\DI;
use Phalcon\Paginator\AdapterInterface;

/**
 * Abstract resolver
 *
 * @category  PhalconEye
 * @package   Engine\Form\Behavior
 * @author    Ivan Vorontsov <lantian.ivan@gmail.com>
 * @copyright 2013-2016 PhalconEye Team
 * @license   New BSD License
 * @link      http://phalconeye.com/
 */
abstract class AbstractResolver implements ResolverInterface
{
    /**
     * Grid object.
     *
     * @var GridInterface
     */
    protected $_grid;

    /**
     * Create resolver.
     *
     * @param GridInterface $grid Grid object.
     */
    public function __construct(GridInterface $grid)
    {
        $this->_grid = $grid;
    }

    /**
     * Resolve source and return paginator.
     *
     * @param mixed $source Source.
     *
     * @throws \Engine\Grid\Exception
     * @return AdapterInterface
     */
    abstract public function resolve($source);

    /**
     * Get request param.
     *
     * @param string $name    Param name.
     * @param mixed  $default Default value for param.
     *
     * @return mixed
     */
    protected function _getParam($name, $default = null)
    {
        return $this->_grid->getDI()->getRequest()->get($name, null, $default);
    }
}