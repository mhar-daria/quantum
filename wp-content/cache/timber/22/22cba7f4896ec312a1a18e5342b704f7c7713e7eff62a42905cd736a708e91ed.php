<?php

/* modules/agent/widgets/single-agent/form.twig */
class __TwigTemplate_f1ba207f77f99c857e3e30e135683ef563f2818f1329a797fa5269ebebd66823 extends Twig_Template
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
        $context["widget"] = $this->loadTemplate("macro-widget-form.twig", "modules/agent/widgets/single-agent/form.twig", 1);
        // line 2
        echo "<p>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("The title and subtext will not be visible, if the widget is first in the sidebar.", "realtyspace")), "html", null, true);
        echo "</p>
";
        // line 3
        echo $context["widget"]->gettext_field((isset($context["title"]) ? $context["title"] : null), call_user_func_array($this->env->getFunction('__')->getCallable(), array("Title", "realtyspace")));
        echo "
";
        // line 4
        echo $context["widget"]->gettext_field((isset($context["subtext"]) ? $context["subtext"] : null), call_user_func_array($this->env->getFunction('__')->getCallable(), array("Subtext", "realtyspace")));
        echo "
";
        // line 5
        echo $context["widget"]->getselect_field((isset($context["agent_list"]) ? $context["agent_list"] : null), call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent list", "realtyspace")));
        echo "
";
        // line 6
        echo $context["widget"]->getselect_field((isset($context["cf7_list"]) ? $context["cf7_list"] : null), call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contact Form 7", "realtyspace")));
        echo "
";
        // line 9
        echo "    ";
        // line 10
        echo "    ";
        // line 11
        echo "    ";
    }

    public function getTemplateName()
    {
        return "modules/agent/widgets/single-agent/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 11,  44 => 10,  42 => 9,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/widgets/single-agent/form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/widgets/single-agent/form.twig");
    }
}
