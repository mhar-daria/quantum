<?php

/* modules/agent/widgets/agent-list/form.twig */
class __TwigTemplate_5c904d27b6b4477fc9da8529333e7678d3364f713ecb08858e993c444edc209d extends Twig_Template
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
        $context["form"] = $this->loadTemplate("macro-widget-form.twig", "modules/agent/widgets/agent-list/form.twig", 1);
        // line 2
        echo $context["form"]->gettext_field((isset($context["title"]) ? $context["title"] : null));
        echo "
";
        // line 3
        echo $context["form"]->gettext_field((isset($context["subtext"]) ? $context["subtext"] : null));
        echo "
";
        // line 4
        echo $context["form"]->gettext_field((isset($context["agent_ids"]) ? $context["agent_ids"] : null));
        echo "
";
        // line 5
        echo $context["form"]->getnumber_field((isset($context["limit"]) ? $context["limit"] : null));
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/agent/widgets/agent-list/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 5,  29 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/widgets/agent-list/form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/widgets/agent-list/form.twig");
    }
}
