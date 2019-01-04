<?php

/* modules/contact/widgets/contact-form/widget.twig */
class __TwigTemplate_ca2187ca614b98eb2a16fc8adf552a8987a49f4b01648ba0ea755bf085a2904f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("widget.twig", "modules/contact/widgets/contact-form/widget.twig", 3);
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
        $context["__internal_34248a1a08cf3047d1d933be45364c3c22c772a284df0018eb0cad97b12c0619"] = $this->loadTemplate("macro.twig", "modules/contact/widgets/contact-form/widget.twig", 1);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        echo $context["__internal_34248a1a08cf3047d1d933be45364c3c22c772a284df0018eb0cad97b12c0619"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <div class=\"form form--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo "\">
    ";
        // line 11
        echo do_shortcode((("[contact-form-7 id='" . (isset($context["cf7_id"]) ? $context["cf7_id"] : null)) . "']"));
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/contact/widgets/contact-form/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 11,  45 => 10,  42 => 9,  35 => 6,  32 => 5,  28 => 3,  26 => 1,  11 => 3,);
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

{% extends 'widget.twig' %}

{% block header %}
  {{ widget_header(title, subtext, widget.modifier) }}
{% endblock %}

{% block content %}
  <div class=\"form form--{{ widget.modifier }}\">
    {{ \"[contact-form-7 id='#{cf7_id}']\"|shortcodes|raw }}
  </div>
{% endblock %}
", "modules/contact/widgets/contact-form/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/contact/widgets/contact-form/widget.twig");
    }
}
