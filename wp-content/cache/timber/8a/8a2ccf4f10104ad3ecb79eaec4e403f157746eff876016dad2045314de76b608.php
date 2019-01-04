<?php

/* modules/other/sections/features.twig */
class __TwigTemplate_63575d2b024ae5444aab5876b0bd2ddc4b3c62f13d966adeb338f69d3620783b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 8
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/other/sections/features.twig", 8);
        $this->blocks = array(
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
        $context["__internal_78136a767e3ee891866863d7ac048afc2f3584d6d4f177f4f9fc8a33f8a8e65a"] = $this->loadTemplate("macro.twig", "modules/other/sections/features.twig", 1);
        // line 4
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("features", array("animate" => true)));
        // line 10
        $context["widget_class"] = "landing feature";
        // line 8
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "  <div class=\"feature\">
    ";
        // line 14
        echo $context["__internal_78136a767e3ee891866863d7ac048afc2f3584d6d4f177f4f9fc8a33f8a8e65a"]->getwidget_header($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "subtitle", array()), "feature");
        echo "
    <!-- end of block .feature__header-->
    <div class=\"feature__list\">
      ";
        // line 17
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "is_vc", array())) {
            // line 18
            echo "        ";
            echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "inner_content", array());
            echo "
      ";
        } else {
            // line 20
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "items", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 21
                echo "          <div class=\"feature__item\">
            ";
                // line 22
                echo $context["__internal_78136a767e3ee891866863d7ac048afc2f3584d6d4f177f4f9fc8a33f8a8e65a"]->geticon($this->getAttribute($context["item"], "icon", array()), "feature__icon");
                echo "
            <div class=\"feature__item-content\">
              <h3 class=\"feature__item-title\">";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</h3>
              <div class=\"feature__text\">
                ";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true);
                echo "
              </div>
            </div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "      ";
        }
        // line 32
        echo "    </div>
    <!-- end of block .feature__list-->
    <!-- end of .feature__content-->
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/other/sections/features.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 32,  84 => 31,  73 => 26,  68 => 24,  63 => 22,  60 => 21,  55 => 20,  49 => 18,  47 => 17,  41 => 14,  38 => 13,  35 => 12,  31 => 8,  29 => 10,  27 => 4,  25 => 1,  11 => 8,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% from 'macro.twig' import widget_header, icon %}
{# @var section \\cf47\\plugin\\realtyspace\\module\\other\\section\\features\\FeaturesView #}

{% set module_id = js_module('features', {
'animate': true,
}) %}

{% extends 'section-widget.twig' %}

{% set widget_class='landing feature' %}

{% block content %}
  <div class=\"feature\">
    {{ widget_header(section.title, section.subtitle, 'feature') }}
    <!-- end of block .feature__header-->
    <div class=\"feature__list\">
      {% if section.is_vc %}
        {{ section.inner_content|raw }}
      {% else %}
        {% for item in section.items %}
          <div class=\"feature__item\">
            {{ icon(item.icon, 'feature__icon') }}
            <div class=\"feature__item-content\">
              <h3 class=\"feature__item-title\">{{ item.title }}</h3>
              <div class=\"feature__text\">
                {{ item.text }}
              </div>
            </div>
          </div>
        {% endfor %}
      {% endif %}
    </div>
    <!-- end of block .feature__list-->
    <!-- end of .feature__content-->
  </div>
{% endblock %}", "modules/other/sections/features.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/other/sections/features.twig");
    }
}
