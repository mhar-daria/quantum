<?php

/* custom-base-archive.twig */
class __TwigTemplate_dac653517931c86a717e65956820b49c33beada5d099dc11bd66eeb787ab811a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("custom-base.twig", "custom-base-archive.twig", 1);
        $this->blocks = array(
            'hero_unit' => array($this, 'block_hero_unit'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "custom-base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_hero_unit($context, array $blocks = array())
    {
        // line 4
        echo "     ";
        if ((array_key_exists("page", $context) && $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "hero_unit", array()), "enabled", array()))) {
            // line 5
            echo "       ";
            echo twig_include($this->env, $context, "partials/hero-unit.twig", array("hero_unit" => $this->getAttribute(            // line 6
(isset($context["page"]) ? $context["page"] : null), "hero_unit", array()), "title" => $this->getAttribute(            // line 7
(isset($context["page"]) ? $context["page"] : null), "title", array()), "subtitle" => $this->getAttribute(            // line 8
(isset($context["page"]) ? $context["page"] : null), "subtitle", array())), false);
            // line 9
            echo "
     ";
        }
        // line 11
        echo "   ";
    }

    public function getTemplateName()
    {
        return "custom-base-archive.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 11,  40 => 9,  38 => 8,  37 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'custom-base.twig' %}

   {% block hero_unit %}
     {% if page is defined and page.hero_unit.enabled %}
       {{ include('partials/hero-unit.twig',{
         'hero_unit': page.hero_unit,
         'title': page.title,
         'subtitle': page.subtitle
       }, with_context = false) }}
     {% endif %}
   {% endblock %}", "custom-base-archive.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/custom-base-archive.twig");
    }
}
