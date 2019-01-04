<?php

/* modules/property/sections/property-group/vc.twig */
class __TwigTemplate_64fd0fcf35024404784a5fef9f99e666f654a4bce7190412ed236af4d059cc37 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/property/sections/property-group/vc.twig", 9);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "section-widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_65e58d95d96360eaca7dd3a8b3ea468e255cac2f83654aab63c1f399de03a738"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/sections/property-group/vc.twig", 1);
        // line 2
        $context["__internal_0b0dcf18c0b65218903d37c3f8dcf5a18de2a2b57fefcdcd3cc525c4dcab65d1"] = $this->loadTemplate("macro.twig", "modules/property/sections/property-group/vc.twig", 2);
        // line 5
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("propertyGroup", array("animate" => true)));
        // line 11
        $context["widget_class"] = "landing gray properties-section";
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "  ";
        echo $context["__internal_0b0dcf18c0b65218903d37c3f8dcf5a18de2a2b57fefcdcd3cc525c4dcab65d1"]->getwidget_header($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "subtitle", array()));
        echo "
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "  ";
        if (($this->getAttribute($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "content", array()), "tab_count", array()) > 1)) {
            // line 19
            echo "    <div class=\"tab tab--properties\">
      <ul role=\"tablist\" class=\"nav tab__nav\">
        ";
            // line 21
            echo $this->getAttribute($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "content", array()), "tab_header", array());
            echo "
      </ul>
      <div class=\"tab-content\">
        ";
            // line 24
            echo $this->getAttribute($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "content", array()), "tab_content", array());
            echo "
      </div>
    </div>
    <div class=\"tab tab--properties\" style=\"padding-top: 30px;\">
      <button type=\"button\" class=\"form__submit js-scrollup scrollup-show\" style=\"
          margin-left: auto;
          margin-right: auto;
          display: block;
      \">See More</button>
    </div>
  ";
        } else {
            // line 35
            echo "    ";
            echo $this->getAttribute($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "content", array()), "tab_content", array());
            echo "
  ";
        }
    }

    public function getTemplateName()
    {
        return "modules/property/sections/property-group/vc.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 35,  64 => 24,  58 => 21,  54 => 19,  51 => 18,  48 => 17,  41 => 14,  38 => 13,  34 => 9,  32 => 11,  30 => 5,  28 => 2,  26 => 1,  11 => 9,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% from 'modules/property/macro.twig' import grid_item %}
{% from 'macro.twig' import widget_header, no_items_available %}
{# @var section \\cf47\\plugin\\realtyspace\\module\\property\\section\\group\\PropertyGroupVcView #}

{% set module_id = js_module('propertyGroup', {
'animate': true,
}) %}

{% extends 'section-widget.twig' %}

{% set widget_class='landing gray properties-section' %}

{% block header %}
  {{ widget_header(section.title, section.subtitle) }}
{% endblock %}

{% block content %}
  {% if section.content.tab_count > 1 %}
    <div class=\"tab tab--properties\">
      <ul role=\"tablist\" class=\"nav tab__nav\">
        {{ section.content.tab_header|raw }}
      </ul>
      <div class=\"tab-content\">
        {{ section.content.tab_content|raw }}
      </div>
    </div>
    <div class=\"tab tab--properties\" style=\"padding-top: 30px;\">
      <button type=\"button\" class=\"form__submit js-scrollup scrollup-show\" style=\"
          margin-left: auto;
          margin-right: auto;
          display: block;
      \">See More</button>
    </div>
  {% else %}
    {{ section.content.tab_content|raw }}
  {% endif %}
{% endblock %}
", "modules/property/sections/property-group/vc.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/property/sections/property-group/vc.twig");
    }
}
