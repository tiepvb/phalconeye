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
  | Author: Piotr Gasiorowski <p.gasiorowski@vipserv.org>                  |
  +------------------------------------------------------------------------+
*/

namespace Engine\Form\Element;

use Engine\Behavior\TranslationBehavior;
use Engine\Form\AbstractElement;
use Engine\Form\ElementInterface;

/**
 * Form element - Button.
 *
 * @category  PhalconEye
 * @package   Engine\Form\Element
 * @author    Ivan Vorontsov <lantian.ivan@gmail.com>
 * @author    Piotr Gasiorowski <p.gasiorowski@vipserv.org>
 * @copyright 2013-2016 PhalconEye Team
 * @license   New BSD License
 * @link      http://phalconeye.com/
 */
class Button extends AbstractElement implements ElementInterface
{
    use TranslationBehavior;

    /**
     * If element is need to be rendered in default layout.
     *
     * @return bool
     */
    public function useDefaultLayout()
    {
        return false;
    }

    /**
     * If element is need to be rendered in default layout.
     *
     * @return bool
     */
    public function isIgnored()
    {
        return true;
    }

    /**
     * Get allowed options for this element.
     *
     * @return array
     */
    public function getAllowedOptions()
    {
        return ['htmlTemplate', 'label', 'isSubmit'];
    }

    /**
     * Get element default options.
     *
     * @return array
     */
    public function getDefaultOptions()
    {
        return ['isSubmit' => true];
    }

    /**
     * Get element default attribute.
     *
     * @return array
     */
    public function getDefaultAttributes()
    {
        return array_merge(
            parent::getDefaultAttributes(),
            (
            $this->getOption('isSubmit') ?
                ['type' => 'submit', 'class' => 'btn btn-primary']
                :
                ['type' => 'button', 'class' => 'btn']
            )
        );
    }

    /**
     * Get element html template.
     *
     * @return string
     */
    public function getHtmlTemplate()
    {
        return $this->getOption('htmlTemplate', '<button' . $this->_renderAttributes() . '>%s</button>');
    }

    /**
     * Get element html template values
     *
     * @return array
     */
    public function getHtmlTemplateValues()
    {
        return [$this->_($this->getOption('label'))];
    }

    /**
     * Render element.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->getAttribute('value') && $this->getValue()) {
            $this->setAttribute('value', $this->getValue());
        }

        return parent::render();
    }
}