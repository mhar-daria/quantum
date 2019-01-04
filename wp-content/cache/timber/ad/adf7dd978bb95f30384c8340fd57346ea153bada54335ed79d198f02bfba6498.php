<?php

/* partials/top-nav.twig */
class __TwigTemplate_05655ac14f2b5221747ab1d868a3bdf06ebe865db2bfcb7cf1afb7dd8ba437a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- BEGIN NAVBAR-->
<div id=\"header-nav-offset\"></div>
<nav id=\"header-nav\" class=\"
navbar navbar--header
 ";
        // line 5
        if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "show_hero_header", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method")) {
            // line 6
            echo "    navbar--overlay
    ";
        } elseif ($this->getAttribute(        // line 7
(isset($context["layout"]) ? $context["layout"] : null), "show_slider_header", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method")) {
            // line 8
            echo "    navbar--overlay navbar--brand
 ";
        }
        // line 10
        echo " navbar--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_position", array()), "html", null, true);
        echo "
\">
  <div class=\"container\">
    <div class=\"navbar__row js-navbar-row\">
      ";
        // line 14
        if ((isset($context["logged_in"]) ? $context["logged_in"] : null)) {
            // line 15
            echo "        ";
            echo call_user_func_array($this->env->getFunction('nav_menu')->getCallable(), array("logged_in_header_menu"));
            echo "
      ";
        } else {
            // line 17
            echo "        ";
            echo call_user_func_array($this->env->getFunction('nav_menu')->getCallable(), array("logged_out_header_menu"));
            echo "
      ";
        }
        // line 19
        echo "    </div>
  </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "partials/top-nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 19,  52 => 17,  46 => 15,  44 => 14,  36 => 10,  32 => 8,  30 => 7,  27 => 6,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/top-nav.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/partials/top-nav.twig");
    }
}
