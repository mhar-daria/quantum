<?php

/* modules/agent/pages/single/includes/agent-properties.twig */
class __TwigTemplate_0f6abccfaab5af90cc5e084f95c5d7d34b850ad64b8c6754fa3af92962dec3cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/agent/pages/single/includes/agent-properties.twig", 1);
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
        // line 2
        $context["__internal_495112f712b59e3b1409e0dd155e223a4cc62514d55d75d679e02f9f04123d22"] = $this->loadTemplate("macro.twig", "modules/agent/pages/single/includes/agent-properties.twig", 2);
        // line 4
        $context["widget_class"] = "main";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_header($context, array $blocks = array())
    {
        // line 7
        echo "  ";
        echo $context["__internal_495112f712b59e3b1409e0dd155e223a4cc62514d55d75d679e02f9f04123d22"]->getwidget_header(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent Listings", "realtyspace")));
        echo "
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  ";
        $context["__internal_eaf83d3800882712bf226a80891a732e5b7651f2fc99ef682dd6121b2904c8c1"] = $this->loadTemplate("macro.twig", "modules/agent/pages/single/includes/agent-properties.twig", 11);
        // line 12
        echo "  ";
        $context["__internal_4f85ed784028da7977797c33fd8164f6fce5c5c98bb47b2a8f29ca5b19bcb792"] = $this->loadTemplate("modules/property/macro.twig", "modules/agent/pages/single/includes/agent-properties.twig", 12);
        // line 13
        echo "  <div class=\"listing listing--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()), "html", null, true);
        echo " listing--lg-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_grid_size", array()), "html_attr");
        echo " properties properties--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()), "html", null, true);
        echo " js-ajax-container\">
    ";
        // line 14
        $context["data"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties", array());
        // line 15
        echo "    ";
        echo $context["__internal_4f85ed784028da7977797c33fd8164f6fce5c5c98bb47b2a8f29ca5b19bcb792"]->getitems($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "items", array()), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()));
        echo "
  </div>

  ";
        // line 18
        echo $context["__internal_eaf83d3800882712bf226a80891a732e5b7651f2fc99ef682dd6121b2904c8c1"]->getpagination($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pagination", array()));
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/agent/pages/single/includes/agent-properties.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 18,  64 => 15,  62 => 14,  53 => 13,  50 => 12,  47 => 11,  44 => 10,  37 => 7,  34 => 6,  30 => 1,  28 => 4,  26 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'section-widget.twig' %}
{% from 'macro.twig' import widget_header %}

{% set widget_class='main' %}

{% block header %}
  {{ widget_header(__('Agent Listings', 'realtyspace')) }}
{% endblock %}

{% block content %}
  {% from 'macro.twig' import pagination %}
  {% from 'modules/property/macro.twig' import items as property_items %}
  <div class=\"listing listing--{{ page.agent_properties_display_mode }} listing--lg-{{ page.agent_properties_grid_size|e('html_attr') }} properties properties--{{ page.agent_properties_display_mode }} js-ajax-container\">
    {% set data = page.agent_properties %}
    {{ property_items(data.items, page.agent_properties_display_mode) }}
  </div>

  {{ pagination(data.pagination) }}
{% endblock %}", "modules/agent/pages/single/includes/agent-properties.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/pages/single/includes/agent-properties.twig");
    }
}
