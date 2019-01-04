<?php

/* modules/agent/widgets/agent-list/widget.twig */
class __TwigTemplate_39c92a5903700273750c2725966e3ef0080b3c63937fc6ae8f3b6b8ff5d4725d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("widget.twig", "modules/agent/widgets/agent-list/widget.twig", 3);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_d7ffb78b557f2d1a2f0aaf528f0b382c24ecdaf04b1dc7348a1a6c65dc022539"] = $this->loadTemplate("macro.twig", "modules/agent/widgets/agent-list/widget.twig", 1);
        // line 2
        $context["__internal_1c5ccc18c28852a87593dfcb70ba76fb56ce52711cb2a11fb0132700010965e8"] = $this->loadTemplate("modules/agent/macro.twig", "modules/agent/widgets/agent-list/widget.twig", 2);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        echo $context["__internal_d7ffb78b557f2d1a2f0aaf528f0b382c24ecdaf04b1dc7348a1a6c65dc022539"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <div class=\"listing listing--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo " worker worker--sidebar-list js-data-container\">
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["agents"]) ? $context["agents"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["agent"]) {
            // line 12
            echo "      ";
            echo $context["__internal_1c5ccc18c28852a87593dfcb70ba76fb56ce52711cb2a11fb0132700010965e8"]->getagent_item_short($context["agent"], (isset($context["is_wide"]) ? $context["is_wide"] : null));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/agent/widgets/agent-list/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 14,  56 => 12,  52 => 11,  47 => 10,  44 => 9,  37 => 6,  34 => 5,  30 => 3,  28 => 2,  26 => 1,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% from 'macro.twig' import widget_header %}
{% from 'modules/agent/macro.twig' import agent_item_short %}
{% extends 'widget.twig' %}

{% block header %}
  {{ widget_header(title, subtext, widget.modifier) }}
{% endblock %}

{% block content %}
  <div class=\"listing listing--{{ widget.modifier }} worker worker--sidebar-list js-data-container\">
    {% for agent in agents %}
      {{ agent_item_short(agent, is_wide) }}
    {% endfor %}
  </div>
{% endblock %}", "modules/agent/widgets/agent-list/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/widgets/agent-list/widget.twig");
    }
}
