<?php

/* modules/contact/widgets/contact-form/widget.twig */
class __TwigTemplate_c92fd545db10793a900726c97fcf41c3ee71dce715e285f4df2e0a8b462de18a extends Twig_Template
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
        $context["__internal_98e821a7c7edec478f35afe1e631c0e0ee01ed873a7da2b464d2a6c6cc8ccb65"] = $this->loadTemplate("macro.twig", "modules/contact/widgets/contact-form/widget.twig", 1);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        echo $context["__internal_98e821a7c7edec478f35afe1e631c0e0ee01ed873a7da2b464d2a6c6cc8ccb65"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
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
        return new Twig_Source("", "modules/contact/widgets/contact-form/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/contact/widgets/contact-form/widget.twig");
    }
}
