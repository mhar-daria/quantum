<?php

/* custom-base.twig */
class __TwigTemplate_bfcbac20a1f457e18bb4753bc4009b717f82bd2f9963090d1cf3a4f9f0224927 extends Twig_Template
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
        $this->loadTemplate("custom-head.twig", "custom-base.twig", 3)->display($context);
        // line 4
        $context["macro"] = $this->loadTemplate("macro.twig", "custom-base.twig", 4);
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
        $this->loadTemplate("partials/header.twig", "custom-base.twig", 18)->display($context);
        // line 19
        echo "  <div class=\"site-wrap js-site-wrap\">
    ";
        // line 20
        if ($this->getAttribute((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null), "enabled", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method")) {
            // line 21
            echo "      <nav class=\"breadcrumbs\">
        <div class=\"container\">
          <ul class=\"breadcrumbs__list\">
            <li class=\"home\"><span property=\"itemListElement\" typeof=\"ListItem\"><a property=\"item\" typeof=\"WebPage\" title=\"Go to Quantum Real Estate.\" href=\"";
            // line 24
            echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("get_site_url"));
            echo "\" class=\"bcn-type-home\"><span property=\"name\">Quantum Real Estate</span></a><meta property=\"position\" content=\"1\"></span></li>
            <li><span property=\"itemListElement\" typeof=\"ListItem\"><a property=\"item\" typeof=\"WebPage\" title=\"Go to Quantum Real Estate.\" href=\"";
            // line 25
            echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("get_site_url"));
            echo "/property-for-buy-in-dubai\" class=\"bcn-type-home\"><span property=\"name\">Property for buy in Dubai</span></a><meta property=\"position\" content=\"1\"></span></li>
            ";
            // line 26
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "is_child", array())) {
                // line 27
                echo "              <li><span property=\"itemListElement\" typeof=\"ListItem\"><a property=\"item\" typeof=\"WebPage\" title=\"Go to Quantum Real Estate.\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array(), "method"), "html", null, true);
                echo "\" class=\"bcn-type-home\"><span property=\"name\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
                echo "</span></a><meta property=\"position\" content=\"1\"></span></li>
            ";
            }
            // line 29
            echo "          </ul>
        </div>
      </nav>
    ";
        }
        // line 33
        echo "    ";
        $this->displayBlock('hero_unit', $context, $blocks);
        // line 39
        echo "    ";
        $this->displayBlock('wide_section', $context, $blocks);
        // line 40
        echo "    ";
        $this->displayBlock('container', $context, $blocks);
        // line 63
        echo "    ";
        $this->loadTemplate("partials/footer.twig", "custom-base.twig", 63)->display($context);
        // line 64
        echo "  </div>
</div>
";
        // line 66
        if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "scrollup_enabled", array())) {
            // line 67
            echo "  <button type=\"button\" class=\"scrollup js-scrollup\"></button>
";
        }
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_footer")), "html", null, true);
        echo "
<script type=\"text/javascript\" src=\"//maps.google.com/maps/api/js?libraries=places&amp;key=AIzaSyDKkJ9_r-StGOUaQSk03CA1p_42h1vooEo\"></script>
";
        // line 71
        $this->displayBlock('body_end', $context, $blocks);
        // line 72
        echo "</body>
</html>
";
    }

    // line 15
    public function block_js_controller($context, array $blocks = array())
    {
    }

    // line 33
    public function block_hero_unit($context, array $blocks = array())
    {
        // line 34
        echo "      ";
        // line 35
        echo "      ";
        if ((array_key_exists("hero_unit", $context) && $this->getAttribute((isset($context["hero_unit"]) ? $context["hero_unit"] : null), "enabled", array()))) {
            // line 36
            echo "        ";
            echo twig_include($this->env, $context, "partials/hero-unit.twig", array("hero_unit" => (isset($context["hero_unit"]) ? $context["hero_unit"] : null)), false);
            echo "
      ";
        }
        // line 38
        echo "    ";
    }

    // line 39
    public function block_wide_section($context, array $blocks = array())
    {
    }

    // line 40
    public function block_container($context, array $blocks = array())
    {
        // line 41
        echo "      <div class=\"center\">
        <div class=\"container\">
          ";
        // line 43
        $this->displayBlock('row', $context, $blocks);
        // line 60
        echo "        </div>
      </div>
    ";
    }

    // line 43
    public function block_row($context, array $blocks = array())
    {
        // line 44
        echo "            <div class=\"row\">
              ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "              ";
        $this->displayBlock('sidebar', $context, $blocks);
        // line 57
        echo "              ";
        $this->displayBlock('subcontent', $context, $blocks);
        // line 58
        echo "            </div>
          ";
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
    }

    // line 46
    public function block_sidebar($context, array $blocks = array())
    {
        // line 47
        echo "                <div class=\"sidebar\" data-show=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Show", "realtyspace")), "html", null, true);
        echo "\" data-hide=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Hide", "realtyspace")), "html", null, true);
        echo "\" >
                  ";
        // line 48
        $context["sidebar"] = call_user_func_array($this->env->getFunction('dynamic_sidebar')->getCallable(), array("cf47rs-global-sidebar"));
        // line 49
        echo "                  ";
        if ((isset($context["sidebar"]) ? $context["sidebar"] : null)) {
            // line 50
            echo "                    ";
            echo (isset($context["sidebar"]) ? $context["sidebar"] : null);
            echo "
                  ";
        } else {
            // line 52
            echo "                    ";
            $this->loadTemplate("partials/default-sidebars.twig", "custom-base.twig", 52)->display($context);
            // line 53
            echo "                  ";
        }
        // line 54
        echo "                </div>
                <div class=\"clearfix\"></div>
              ";
    }

    // line 57
    public function block_subcontent($context, array $blocks = array())
    {
    }

    // line 71
    public function block_body_end($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "custom-base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 71,  243 => 57,  237 => 54,  234 => 53,  231 => 52,  225 => 50,  222 => 49,  220 => 48,  213 => 47,  210 => 46,  205 => 45,  200 => 58,  197 => 57,  194 => 46,  192 => 45,  189 => 44,  186 => 43,  180 => 60,  178 => 43,  174 => 41,  171 => 40,  166 => 39,  162 => 38,  156 => 36,  153 => 35,  151 => 34,  148 => 33,  143 => 15,  137 => 72,  135 => 71,  130 => 69,  126 => 67,  124 => 66,  120 => 64,  117 => 63,  114 => 40,  111 => 39,  108 => 33,  102 => 29,  94 => 27,  92 => 26,  88 => 25,  84 => 24,  79 => 21,  77 => 20,  74 => 19,  72 => 18,  66 => 15,  61 => 13,  57 => 12,  53 => 11,  49 => 10,  45 => 9,  41 => 7,  39 => 6,  37 => 4,  35 => 3,  31 => 2,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "custom-base.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/custom-base.twig");
    }
}
