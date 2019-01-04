<?php

/* modules/property/widgets/property-list/form.twig */
class __TwigTemplate_f8ae4d77785b72dc4f77d5e120c3c3eb78fae6e4958cc881024f006cafa9d50a extends Twig_Template
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
        $context["form"] = $this->loadTemplate("macro-widget-form.twig", "modules/property/widgets/property-list/form.twig", 1);
        // line 2
        echo $context["form"]->gettext_field((isset($context["title"]) ? $context["title"] : null));
        echo "
";
        // line 3
        echo $context["form"]->gettext_field((isset($context["subtext"]) ? $context["subtext"] : null));
        echo "
";
        // line 4
        echo $context["form"]->getselect_field((isset($context["type_list"]) ? $context["type_list"] : null));
        echo "
";
        // line 5
        echo $context["form"]->gettext_field((isset($context["specific_ids"]) ? $context["specific_ids"] : null));
        echo "
";
        // line 6
        echo $context["form"]->getnumber_field((isset($context["limit"]) ? $context["limit"] : null));
    }

    public function getTemplateName()
    {
        return "modules/property/widgets/property-list/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  33 => 5,  29 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/widgets/property-list/form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/widgets/property-list/form.twig");
    }
}
