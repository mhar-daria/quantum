<?php

/* modules/core/404.twig */
class __TwigTemplate_5d7f5ac015f5b4fe67497909183c47d1f7124dccae93571f72d5f357de3bdf57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "modules/core/404.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $context["subtitle"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("It seems we cannot find what you're looking for. Perhaps searching can help.", "realtyspace"));
        // line 5
        echo "  ";
        echo twig_include($this->env, $context, "modules/core/includes/not-found.twig", array("subtitle" => (isset($context["subtitle"]) ? $context["subtitle"] : null)), false);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/core/404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/core/404.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/core/404.twig");
    }
}
