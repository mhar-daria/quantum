<?php

/* base.twig */
class __TwigTemplate_020eee118ca2f16068088605c3478d2a5e1019f7eea1f0bda9a16623f3e7adce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'js_controller' => array($this, 'block_js_controller'),
            'hero_unit' => array($this, 'block_hero_unit'),
            'wide_section' => array($this, 'block_wide_section'),
            'container' => array($this, 'block_container'),
            'row' => array($this, 'block_row'),
            'content' => array($this, 'block_content'),
            'sidebar' => array($this, 'block_sidebar'),
            'subcontent' => array($this, 'block_subcontent'),
            'body_end' => array($this, 'block_body_end'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html class=\"no-js\" ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "language_attributes", array()), "html", null, true);
        echo ">
";
        // line 3
        $this->loadTemplate("partials/head.twig", "base.twig", 3)->display($context);
        // line 4
        $context["macro"] = $this->loadTemplate("macro.twig", "base.twig", 4);
        // line 6
        $context["sidebar_position"] = (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar", array(), "any", true, true)) ? ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar", array())) : ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_sidebar_position", array())));
        // line 7
        echo "
<body class=\"
";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["body_class"]) ? $context["body_class"] : null), "html", null, true);
        echo "
";
        // line 10
        echo ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_wide_boxed", array()) == "boxed")) ? ("boxed") : ("non-boxed"));
        echo "
";
        // line 11
        echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_bg_pattern", array()) != "!none")) ? (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_bg_pattern", array()) . " custom-background")) : ("")), "html", null, true);
        echo "
";
        // line 12
        echo ((((isset($context["sidebar_position"]) ? $context["sidebar_position"] : null) == "left")) ? ("sidebar-left") : (""));
        echo "
";
        // line 13
        echo ((((isset($context["sidebar_position"]) ? $context["sidebar_position"] : null) == "none")) ? ("sidebar-hide") : (""));
        echo "
menu-default slider-default hover-default
\" data-controller=\"";
        // line 15
        $this->displayBlock('js_controller', $context, $blocks);
        echo "\">

<div class=\"box js-box\">
  ";
        // line 18
        $this->loadTemplate("partials/header.twig", "base.twig", 18)->display($context);
        // line 19
        echo "  <div class=\"site-wrap js-site-wrap\">
    ";
        // line 20
        if ($this->getAttribute((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null), "enabled", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method")) {
            // line 21
            echo "      <nav class=\"breadcrumbs\">
        <div class=\"container\">
          <ul class=\"breadcrumbs__list\">
            ";
            // line 24
            echo $this->getAttribute((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null), "render", array());
            echo "
          </ul>
        </div>
      </nav>
    ";
        }
        // line 29
        echo "    ";
        $this->displayBlock('hero_unit', $context, $blocks);
        // line 35
        echo "    ";
        $this->displayBlock('wide_section', $context, $blocks);
        // line 36
        echo "    ";
        $this->displayBlock('container', $context, $blocks);
        // line 59
        echo "    ";
        $this->loadTemplate("partials/footer.twig", "base.twig", 59)->display($context);
        // line 60
        echo "  </div>
</div>
";
        // line 62
        if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "scrollup_enabled", array())) {
            // line 63
            echo "  <button type=\"button\" class=\"scrollup js-scrollup\"></button>
";
        }
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_footer")), "html", null, true);
        echo "
";
        // line 66
        $this->displayBlock('body_end', $context, $blocks);
        // line 67
        echo "</body>
</html>
";
    }

    // line 15
    public function block_js_controller($context, array $blocks = array())
    {
    }

    // line 29
    public function block_hero_unit($context, array $blocks = array())
    {
        // line 30
        echo "      ";
        // line 31
        echo "      ";
        if ((array_key_exists("hero_unit", $context) && $this->getAttribute((isset($context["hero_unit"]) ? $context["hero_unit"] : null), "enabled", array()))) {
            // line 32
            echo "        ";
            echo twig_include($this->env, $context, "partials/hero-unit.twig", array("hero_unit" => (isset($context["hero_unit"]) ? $context["hero_unit"] : null)), false);
            echo "
      ";
        }
        // line 34
        echo "    ";
    }

    // line 35
    public function block_wide_section($context, array $blocks = array())
    {
    }

    // line 36
    public function block_container($context, array $blocks = array())
    {
        // line 37
        echo "      <div class=\"center\">
        <div class=\"container\">
          ";
        // line 39
        $this->displayBlock('row', $context, $blocks);
        // line 56
        echo "        </div>
      </div>
    ";
    }

    // line 39
    public function block_row($context, array $blocks = array())
    {
        // line 40
        echo "            <div class=\"row\">
              ";
        // line 41
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "              ";
        $this->displayBlock('sidebar', $context, $blocks);
        // line 53
        echo "              ";
        $this->displayBlock('subcontent', $context, $blocks);
        // line 54
        echo "            </div>
          ";
    }

    // line 41
    public function block_content($context, array $blocks = array())
    {
    }

    // line 42
    public function block_sidebar($context, array $blocks = array())
    {
        // line 43
        echo "                <div class=\"sidebar\" data-show=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Show", "realtyspace")), "html", null, true);
        echo "\" data-hide=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Hide", "realtyspace")), "html", null, true);
        echo "\" >
                  ";
        // line 44
        $context["sidebar"] = call_user_func_array($this->env->getFunction('dynamic_sidebar')->getCallable(), array("cf47rs-global-sidebar"));
        // line 45
        echo "                  ";
        if ((isset($context["sidebar"]) ? $context["sidebar"] : null)) {
            // line 46
            echo "                    ";
            echo (isset($context["sidebar"]) ? $context["sidebar"] : null);
            echo "
                  ";
        } else {
            // line 48
            echo "                    ";
            $this->loadTemplate("partials/default-sidebars.twig", "base.twig", 48)->display($context);
            // line 49
            echo "                  ";
        }
        // line 50
        echo "                </div>
                <div class=\"clearfix\"></div>
              ";
    }

    // line 53
    public function block_subcontent($context, array $blocks = array())
    {
    }

    // line 66
    public function block_body_end($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 66,  226 => 53,  220 => 50,  217 => 49,  214 => 48,  208 => 46,  205 => 45,  203 => 44,  196 => 43,  193 => 42,  188 => 41,  183 => 54,  180 => 53,  177 => 42,  175 => 41,  172 => 40,  169 => 39,  163 => 56,  161 => 39,  157 => 37,  154 => 36,  149 => 35,  145 => 34,  139 => 32,  136 => 31,  134 => 30,  131 => 29,  126 => 15,  120 => 67,  118 => 66,  114 => 65,  110 => 63,  108 => 62,  104 => 60,  101 => 59,  98 => 36,  95 => 35,  92 => 29,  84 => 24,  79 => 21,  77 => 20,  74 => 19,  72 => 18,  66 => 15,  61 => 13,  57 => 12,  53 => 11,  49 => 10,  45 => 9,  41 => 7,  39 => 6,  37 => 4,  35 => 3,  31 => 2,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/base.twig");
    }
}
