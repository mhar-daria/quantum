<?php

/* modules/agent/pages/single/includes/custom-agent-properties.twig */
class __TwigTemplate_ecc2faa6c64c59f4c61e87f448c4d2bc372dbf813359c7acfb749a46e7f4de86 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/agent/pages/single/includes/custom-agent-properties.twig", 1);
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
        $context["__internal_9a3b745c39ecabb7ca3cbf8c4c247531d7fbca0fff6f3d3c84a8b2d428c254c0"] = $this->loadTemplate("macro.twig", "modules/agent/pages/single/includes/custom-agent-properties.twig", 2);
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
        echo $context["__internal_9a3b745c39ecabb7ca3cbf8c4c247531d7fbca0fff6f3d3c84a8b2d428c254c0"]->getwidget_header(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent Listings", "realtyspace")));
        echo "
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  ";
        // line 12
        echo "  ";
        $context["__internal_c6103ac7b577577df869e0230e3751c33c18ed3b2df4037a06c4993ff48ca58d"] = $this->loadTemplate("macro.twig", "modules/agent/pages/single/includes/custom-agent-properties.twig", 12);
        // line 13
        echo "  ";
        // line 14
        echo "  <div class=\"listing listing--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()), "html", null, true);
        echo " listing--lg-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_grid_size", array()), "html_attr");
        echo " properties properties--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()), "html", null, true);
        echo " js-ajax-container\">
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties", array()), "properties", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 16
            echo "      ";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "customProperties", array()), "generate_boxes", array(0 => $context["property"]), "method");
            echo "
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 18
            echo "      ";
            echo $context["__internal_c6103ac7b577577df869e0230e3751c33c18ed3b2df4037a06c4993ff48ca58d"]->getno_items_available(call_user_func_array($this->env->getFunction('__')->getCallable(), array("No properties available", "realtyspace")));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "  </div>

  ";
    }

    public function getTemplateName()
    {
        return "modules/agent/pages/single/includes/custom-agent-properties.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 20,  76 => 18,  68 => 16,  63 => 15,  54 => 14,  52 => 13,  49 => 12,  47 => 11,  44 => 10,  37 => 7,  34 => 6,  30 => 1,  28 => 4,  26 => 2,  11 => 1,);
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
  {# from 'macro.twig' import pagination #}
  {% from 'macro.twig' import no_items_available %}
  {# from 'modules/property/macro.twig' import items as property_items #}
  <div class=\"listing listing--{{ page.agent_properties_display_mode }} listing--lg-{{ page.agent_properties_grid_size|e('html_attr') }} properties properties--{{ page.agent_properties_display_mode }} js-ajax-container\">
    {% for property in page.agent_properties.properties %}
      {{ page.customProperties.generate_boxes(property)|raw }}
    {% else %}
      {{ no_items_available(__('No properties available', 'realtyspace')) }}
    {% endfor %}
  </div>

  {# pagination(data.pagination) #}
{% endblock %}", "modules/agent/pages/single/includes/custom-agent-properties.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/pages/single/includes/custom-agent-properties.twig");
    }
}
