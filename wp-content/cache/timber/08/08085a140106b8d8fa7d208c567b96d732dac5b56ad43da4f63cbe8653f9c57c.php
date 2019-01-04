<?php

/* modules/user/widgets/user-profile/form.twig */
class __TwigTemplate_3b4279d2d23a384e9b3b8a9f7a719746f0f2fb95dced650b00cbd2ad61b56c95 extends Twig_Template
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
        $context["form"] = $this->loadTemplate("macro-widget-form.twig", "modules/user/widgets/user-profile/form.twig", 1);
        // line 2
        echo $context["form"]->gettext_field((isset($context["title"]) ? $context["title"] : null));
        echo "
";
        // line 3
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("This widget will be visible only to logged-in users", "realtyspace")), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/user/widgets/user-profile/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/user/widgets/user-profile/form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/user/widgets/user-profile/form.twig");
    }
}
