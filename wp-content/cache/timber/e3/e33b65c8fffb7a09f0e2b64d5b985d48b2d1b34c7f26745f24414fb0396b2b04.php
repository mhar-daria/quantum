<?php

/* section-widget.twig */
class __TwigTemplate_00cbb8d7ced3ffc720d7dce1c3b2e4e2373d7f00c950f41b91261afd221b25bd extends Twig_Template
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
        return new Twig_Source("", "section-widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/section-widget.twig");
    }
}
