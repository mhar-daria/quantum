<?php

/* modules/other/sections/features-item.twig */
class __TwigTemplate_5acd122d09ee307676a9721c0c958d578e77d89b7bea592255a10eaa91b4b5a5 extends Twig_Template
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
        // line 2
        $context["__internal_83cb48ee45cab46c660e0e177ce2f36ec0d8f313b8fe3978643b58e91e7ba9f6"] = $this->loadTemplate("macro.twig", "modules/other/sections/features-item.twig", 2);
        // line 3
        echo "<div class=\"feature__item\">
  ";
        // line 4
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "icon", array())) {
            // line 5
            echo "    ";
            echo $context["__internal_83cb48ee45cab46c660e0e177ce2f36ec0d8f313b8fe3978643b58e91e7ba9f6"]->geticon($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "icon", array()), "feature__icon");
            echo "
  ";
        }
        // line 7
        echo "  <div class=\"feature__item-content\">
    <h3 class=\"feature__item-title\">";
        // line 8
        echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "label", array());
        echo "</h3>
    <div class=\"feature__text\">
      ";
        // line 10
        echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "text", array());
        echo "
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/other/sections/features-item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 10,  35 => 8,  32 => 7,  26 => 5,  24 => 4,  21 => 3,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var section \\cf47\\plugin\\realtyspace\\module\\other\\section\\features\\item\\FeaturesItemView #}
{% from 'macro.twig' import icon %}
<div class=\"feature__item\">
  {% if section.icon %}
    {{ icon(section.icon, 'feature__icon') }}
  {% endif %}
  <div class=\"feature__item-content\">
    <h3 class=\"feature__item-title\">{{ section.label|raw }}</h3>
    <div class=\"feature__text\">
      {{ section.text|raw }}
    </div>
  </div>
</div>", "modules/other/sections/features-item.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/other/sections/features-item.twig");
    }
}
