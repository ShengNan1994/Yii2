<?php

/**
 * XHTML 1.1 Text Module, defines basic text containers. Core Module.
 * @note In the normative XML Schema specification, this module
 *       is further abstracted into the following modules:
 *          - Block Phrasal (address, blockquote, pre, h1, h2, h3, h4, h5, h6)
 *          - Block Structural (div, p)
 *          - Inline Phrasal (abbr, acronym, cite, code, dfn, em, kbd, q, samp, strong, var)
 *          - Inline Structural (br, span)
 *       This module, functionally, does not distinguish between these
 *       sub-modules, but the code is internally structured to reflect
 *       these distinctions.
 */
class HTMLPurifier_HTMLModule_Text extends HTMLPurifier_HTMLModule
{
    /**
     * @type string
     */
    public $name = 'Text';

    /**
     * @type array
     */
    public $content_sets = array(
        'Flow' => 'Heading | Block | Inline'
    );

    /**
     * @param HTMLPurifier_Config $config
     */
    public function setup($config)
    {
        // Inline Phrasal -------------------------------------------------
        $this->addElement('abbr', 'Inline', 'Inline', 'Articles');
        $this->addElement('acronym', 'Inline', 'Inline', 'Articles');
        $this->addElement('cite', 'Inline', 'Inline', 'Articles');
        $this->addElement('dfn', 'Inline', 'Inline', 'Articles');
        $this->addElement('kbd', 'Inline', 'Inline', 'Articles');
        $this->addElement('q', 'Inline', 'Inline', 'Articles', array('cite' => 'URI'));
        $this->addElement('samp', 'Inline', 'Inline', 'Articles');
        $this->addElement('var', 'Inline', 'Inline', 'Articles');

        $em = $this->addElement('em', 'Inline', 'Inline', 'Articles');
        $em->formatting = true;

        $strong = $this->addElement('strong', 'Inline', 'Inline', 'Articles');
        $strong->formatting = true;

        $code = $this->addElement('code', 'Inline', 'Inline', 'Articles');
        $code->formatting = true;

        // Inline Structural ----------------------------------------------
        $this->addElement('span', 'Inline', 'Inline', 'Articles');
        $this->addElement('br', 'Inline', 'Empty', 'Core');

        // Block Phrasal --------------------------------------------------
        $this->addElement('address', 'Block', 'Inline', 'Articles');
        $this->addElement('blockquote', 'Block', 'Optional: Heading | Block | List', 'Articles', array('cite' => 'URI'));
        $pre = $this->addElement('pre', 'Block', 'Inline', 'Articles');
        $pre->excludes = $this->makeLookup(
            'img',
            'big',
            'small',
            'object',
            'applet',
            'font',
            'basefont'
        );
        $this->addElement('h1', 'Heading', 'Inline', 'Articles');
        $this->addElement('h2', 'Heading', 'Inline', 'Articles');
        $this->addElement('h3', 'Heading', 'Inline', 'Articles');
        $this->addElement('h4', 'Heading', 'Inline', 'Articles');
        $this->addElement('h5', 'Heading', 'Inline', 'Articles');
        $this->addElement('h6', 'Heading', 'Inline', 'Articles');

        // Block Structural -----------------------------------------------
        $p = $this->addElement('p', 'Block', 'Inline', 'Articles');
        $p->autoclose = array_flip(
            array("address", "blockquote", "center", "dir", "div", "dl", "fieldset", "ol", "p", "ul")
        );

        $this->addElement('div', 'Block', 'Flow', 'Articles');
    }
}

// vim: et sw=4 sts=4
