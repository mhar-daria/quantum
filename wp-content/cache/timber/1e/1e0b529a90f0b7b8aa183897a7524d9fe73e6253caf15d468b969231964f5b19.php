<?php

/* modules/contact/widgets/contact-info/form.twig */
class __TwigTemplate_7cbdb9c2e49a78ac1ff7ef008dcf4bff51a716fe0b5e644780593fc3b42feeeb extends Twig_Template
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
        $context["form"] = $this->loadTemplate("macro-widget-form.twig", "modules/contact/widgets/contact-info/form.twig", 1);
        // line 2
        echo $context["form"]->gettext_field((isset($context["title"]) ? $context["title"] : null));
        echo "
";
        // line 3
        echo $context["form"]->gettext_field((isset($context["subtext"]) ? $context["subtext"] : null));
        echo "
";
        // line 4
        echo $context["form"]->gettext_field((isset($context["address_text"]) ? $context["address_text"] : null));
        echo "
";
        // line 5
        echo $context["form"]->gettext_field((isset($context["hours_text"]) ? $context["hours_text"] : null));
        echo "
";
        // line 6
        echo $context["form"]->gettext_field((isset($context["phone_text"]) ? $context["phone_text"] : null));
        echo "
";
        // line 7
        echo $context["form"]->gettext_field((isset($context["cellphone_text"]) ? $context["cellphone_text"] : null));
        echo "
";
        // line 8
        echo $context["form"]->gettext_field((isset($context["fax_text"]) ? $context["fax_text"] : null));
        echo "
";
        // line 9
        echo $context["form"]->gettext_field((isset($context["email_text"]) ? $context["email_text"] : null));
        echo "
";
        // line 10
        echo $context["form"]->gettextarea_field((isset($context["html"]) ? $context["html"] : null));
    }

    public function getTemplateName()
    {
        return "modules/contact/widgets/contact-info/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 10,  49 => 9,  45 => 8,  41 => 7,  37 => 6,  33 => 5,  29 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contact/widgets/contact-info/form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/contact/widgets/contact-info/form.twig");
    }
}
