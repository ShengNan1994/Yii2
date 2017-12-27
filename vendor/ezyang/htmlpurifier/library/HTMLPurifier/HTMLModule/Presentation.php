<?php

/**
 * XHTML 1.1 Presentation Module, defines simple presentation-related
 * markup. Text Extension Module.
 * @note The official XML Schema and DTD specs further divide this into
 *       two modules:
 *          - Block Presentation (hr)
 *          - Inline Presentation (b, big, i, small, sub, sup, tt)
 *       We have chosen not to heed this distinction, as content_sets
 *       provides satisfactory disambiguation.
 */
class HTMLPurifier_HTMLModule_Presentation extends HTMLPurifier_HTMLModule
{

    /**
     * @type string
     */
    public $name = 'Presentation';

    /**
     * @param HTMLPurifier_Config $config
     */
    public function setup($config)
    {
        $this->addElement('hr', 'Block', 'Empty', 'Articles');
        $this->addElement('sub', 'Inline', 'Inline', 'Articles');
        $this->addElement('sup', 'Inline', 'Inline', 'Articles');
        $b = $this->addElement('b', 'Inline', 'Inline', 'Articles');
        $b->formatting = true;
        $big = $this->addElement('big', 'Inline', 'Inline', 'Articles');
        $big->formatting = true;
        $i = $this->addElement('i', 'Inline', 'Inline', 'Articles');
        $i->formatting = true;
        $small = $this->addElement('small', 'Inline', 'Inline', 'Articles');
        $small->formatting = true;
        $tt = $this->addElement('tt', 'Inline', 'Inline', 'Articles');
        $tt->formatting = true;
    }
}

// vim: et sw=4 sts=4
