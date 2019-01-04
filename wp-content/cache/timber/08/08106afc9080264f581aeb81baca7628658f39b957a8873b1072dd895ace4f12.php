<?php

/* modules/property/widgets/property-filter/form.twig */
class __TwigTemplate_7098fee534837dada8bd8ec97841a852a57eade72949e8761a46002b548b72d7 extends Twig_Template
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
        $context["form"] = $this->loadTemplate("macro-widget-form.twig", "modules/property/widgets/property-filter/form.twig", 1);
        // line 2
        echo $context["form"]->gettext_field((isset($context["title"]) ? $context["title"] : null));
        echo "
";
        // line 3
        echo $context["form"]->gettext_field((isset($context["subtext"]) ? $context["subtext"] : null));
        echo "

<p>";
        // line 5
        echo twig_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search fields:", "realtyspace"))), "html", null, true);
        echo "</p>
<ul id=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["widget_id"]) ? $context["widget_id"] : null), "html", null, true);
        echo "-sortable-list\">
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["field_order"]) ? $context["field_order"] : null), "value", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 8
            echo "    ";
            echo $context["form"]->getcheckbox_sort_field($this->getAttribute($context, ("show_field_" . $context["field"])), twig_replace_filter(twig_capitalize_string_filter($this->env, $context["field"]), array("_" => " ")), $context["field"]);
            echo "
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</ul>
<i>";
        // line 11
        echo twig_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Drag and drop to sort the fields.", "realtyspace"))), "html", null, true);
        echo "</i>
<br>
<br>
";
        // line 14
        echo $context["form"]->gethidden_field((isset($context["field_order"]) ? $context["field_order"] : null));
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/property/widgets/property-filter/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 14,  54 => 11,  51 => 10,  42 => 8,  38 => 7,  34 => 6,  30 => 5,  25 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/widgets/property-filter/form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/widgets/property-filter/form.twig");
    }
}
