<?php

/* custom-html.twig */
class __TwigTemplate_1c6c5ec080b57e4253d4f94758bd66b4da0c9e2c31ee875f4470e1d15d0746e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'js_controller' => array($this, 'block_js_controller'),
            'content' => array($this, 'block_content'),
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
<head>
  <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "charset", array()), "html", null, true);
        echo "\"/>
  <meta name=\"description\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "description", array()), "html", null, true);
        echo "\">
  <!--[if IE]>
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=9,chrome=1\">
  <![endif]-->
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=0\">
  <meta name=\"format-detection\" content=\"telephone=no\">
  ";
        // line 11
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "pingback_url", array())) {
            // line 12
            echo "    <link rel=\"pingback\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "pingback_url", array()), "html", null, true);
            echo "\"/>
  ";
        }
        // line 14
        echo "  ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('wp_head')->getCallable(), array()), "html", null, true);
        echo "
  ";
        // line 16
        echo "  <title>Sample</title>
  <link rel=\"alternate\" type=\"application/rss+xml\" title=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "name", array()), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["feed_link"]) ? $context["feed_link"] : null), "html", null, true);
        echo "\">
</head>
";
        // line 19
        $context["macro"] = $this->loadTemplate("macro.twig", "custom-html.twig", 19);
        // line 21
        $context["sidebar_position"] = (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar", array(), "any", true, true)) ? ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar", array())) : ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_sidebar_position", array())));
        // line 22
        echo "
<body class=\"
";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["body_class"]) ? $context["body_class"] : null), "html", null, true);
        echo "
";
        // line 25
        echo ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_wide_boxed", array()) == "boxed")) ? ("boxed") : ("non-boxed"));
        echo "
";
        // line 26
        echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_bg_pattern", array()) != "!none")) ? (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "layout_bg_pattern", array()) . " custom-background")) : ("")), "html", null, true);
        echo "
";
        // line 27
        echo ((((isset($context["sidebar_position"]) ? $context["sidebar_position"] : null) == "left")) ? ("sidebar-left") : (""));
        echo "
";
        // line 28
        echo ((((isset($context["sidebar_position"]) ? $context["sidebar_position"] : null) == "none")) ? ("sidebar-hide") : (""));
        echo "
menu-default slider-default hover-default
\" data-controller=\"";
        // line 30
        $this->displayBlock('js_controller', $context, $blocks);
        echo "\">

<div class=\"box js-box\">
  ";
        // line 33
        $this->loadTemplate("partials/header.twig", "custom-html.twig", 33)->display($context);
        // line 34
        echo "  <div class=\"site-wrap js-site-wrap\">
    ";
        // line 35
        $this->displayBlock('content', $context, $blocks);
        // line 36
        echo "    ";
        $this->loadTemplate("partials/footer.twig", "custom-html.twig", 36)->display($context);
        // line 37
        echo "  </div>
</div>
";
        // line 39
        if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "scrollup_enabled", array())) {
            // line 40
            echo "  <button type=\"button\" class=\"scrollup js-scrollup\"></button>
";
        }
        // line 42
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_footer")), "html", null, true);
        echo "
";
        // line 43
        $this->displayBlock('body_end', $context, $blocks);
        // line 44
        echo "</body>
</html>
";
    }

    // line 30
    public function block_js_controller($context, array $blocks = array())
    {
    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
    }

    // line 43
    public function block_body_end($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "custom-html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 43,  138 => 35,  133 => 30,  127 => 44,  125 => 43,  121 => 42,  117 => 40,  115 => 39,  111 => 37,  108 => 36,  106 => 35,  103 => 34,  101 => 33,  95 => 30,  90 => 28,  86 => 27,  82 => 26,  78 => 25,  74 => 24,  70 => 22,  68 => 21,  66 => 19,  59 => 17,  56 => 16,  51 => 14,  45 => 12,  43 => 11,  34 => 5,  30 => 4,  25 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "custom-html.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/custom-html.twig");
    }
}
