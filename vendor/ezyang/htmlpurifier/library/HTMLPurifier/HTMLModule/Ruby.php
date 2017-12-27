<?php

/**
 * XHTML 1.1 Ruby Annotation Module, defines elements that indicate
 * short runs of text alongside base text for annotation or pronounciation.
 */
class HTMLPurifier_HTMLModule_Ruby extends HTMLPurifier_HTMLModule
{

    /**
     * @type string
     */
    public $name = 'Ruby';

    /**
     * @param HTMLPurifier_Config $config
     */
    public function setup($config)
    {
        $this->addElement(
            'ruby',
            'Inline',
            'Custom: ((rb, (rt | (rp, rt, rp))) | (rbc, rtc, rtc?))',
            'Articles'
        );
        $this->addElement('rbc', false, 'Required: rb', 'Articles');
        $this->addElement('rtc', false, 'Required: rt', 'Articles');
        $rb = $this->addElement('rb', false, 'Inline', 'Articles');
        $rb->excludes = array('ruby' => true);
        $rt = $this->addElement('rt', false, 'Inline', 'Articles', array('rbspan' => 'Number'));
        $rt->excludes = array('ruby' => true);
        $this->addElement('rp', false, 'Optional: #PCDATA', 'Articles');
    }
}

// vim: et sw=4 sts=4
