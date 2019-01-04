<?php

/* section-widget.twig */
class __TwigTemplate_d74fc192fa4bec97f56433f9947d3d4dc9b233bb6984cf31c0d701066eea1191 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'section_attr' => array($this, 'block_section_attr'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"widget
  ";
        // line 3
        if ((isset($context["widget_class"]) ? $context["widget_class"] : null)) {
            // line 4
            echo "    ";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, ("widget--" . twig_replace_filter((isset($context["widget_class"]) ? $context["widget_class"] : null), array(" " => " widget--"))), "esc_attr"), "html", null, true);
            echo "
  ";
        }
        // line 6
        echo "  js-widget ";
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["extra_classes"]) ? $context["extra_classes"] : null), "esc_attr"), "html", null, true);
        echo "
  ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "container_classes", array()), "html", null, true);
        echo "
\"
     ";
        // line 9
        if ((isset($context["module_id"]) ? $context["module_id"] : null)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "esc_attr"), "html", null, true);
            echo "\"";
        }
        // line 10
        echo "    ";
        $this->displayBlock('section_attr', $context, $blocks);
        // line 11
        echo "    ";
        if (($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "is_vc", array()) && $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "container_styles", array()))) {
            echo " style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "container_styles", array()), "html", null, true);
            echo "\"";
        }
        // line 12
        echo ">
  ";
        // line 13
        $this->displayBlock('header', $context, $blocks);
        // line 14
        echo "  <div class=\"widget__content\">
    ";
        // line 15
        $this->displayBlock('content', $context, $blocks);
        // line 16
        echo "  </div>
</div>";
    }

    // line 10
    public function block_section_attr($context, array $blocks = array())
    {
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "section-widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 15,  79 => 13,  74 => 10,  69 => 16,  67 => 15,  64 => 14,  62 => 13,  59 => 12,  52 => 11,  49 => 10,  43 => 9,  38 => 7,  33 => 6,  27 => 4,  25 => 3,  22 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var section \\cf47\\themecore\\section\\AbstractSectionView  #}
<div class=\"widget
  {% if widget_class %}
    {{ ('widget--' ~ widget_class|replace({' ': ' widget--' }))|e('esc_attr') }}
  {% endif %}
  js-widget {{ extra_classes|e('esc_attr') }}
  {{ section.container_classes }}
\"
     {% if module_id %}id=\"{{ module_id|e('esc_attr') }}\"{% endif %}
    {% block section_attr %}{% endblock %}
    {% if section.is_vc and section.container_styles %} style=\"{{ section.container_styles }}\"{% endif %}
>
  {% block header %}{% endblock %}
  <div class=\"widget__content\">
    {% block content %}{% endblock %}
  </div>
</div>", "section-widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/section-widget.twig");
    }
}
