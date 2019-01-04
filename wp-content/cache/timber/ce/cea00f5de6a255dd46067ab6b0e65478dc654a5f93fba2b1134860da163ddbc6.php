<?php

/* partials/default-sidebars.twig */
class __TwigTemplate_147b89883b6552e8c20851e07f8d9ffab9bea4b49cff81de1d255268fae74a75 extends Twig_Template
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
        $context["args"] = array("before_widget" => "<section id=\"%1\$s\" class=\"widget js-widget widget--sidebar %1\$s\">", "after_widget" => "</div></section>", "before_title" => "<header class=\"widget__header\"><h3 class=\"widget__title\">", "after_title" => "</h3></header><div class=\"widget__content\">", "modifier" => "sidebar");
        // line 8
        echo "
";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("the_widget", "WP_Widget_Search", array(), (isset($context["args"]) ? $context["args"] : null))), "html", null, true);
        echo "
";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("the_widget", "WP_Widget_Archives", array(), (isset($context["args"]) ? $context["args"] : null))), "html", null, true);
        echo "
";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("the_widget", "WP_Widget_Calendar", array(), (isset($context["args"]) ? $context["args"] : null))), "html", null, true);
        echo "
";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("the_widget", "WP_Widget_Categories", array(), (isset($context["args"]) ? $context["args"] : null))), "html", null, true);
        echo "
";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("the_widget", "WP_Widget_Recent_Posts", array(), (isset($context["args"]) ? $context["args"] : null))), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "partials/default-sidebars.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 13,  36 => 12,  32 => 11,  28 => 10,  24 => 9,  21 => 8,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/default-sidebars.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/partials/default-sidebars.twig");
    }
}
