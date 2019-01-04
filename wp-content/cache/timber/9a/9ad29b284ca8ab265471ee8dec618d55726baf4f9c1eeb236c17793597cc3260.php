<?php

/* modules/agent/pages/single/single.twig */
class __TwigTemplate_32486ed2bd4aee0e1c8d2e851dc4d77443eb9804ec906891a947ffe4fc83ef85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((call_user_func_array($this->env->getFunction('is_ajax')->getCallable(), array())) ? ("base-ajax.twig") : ("base-archive.twig")), "modules/agent/pages/single/single.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["agent_macro"] = $this->loadTemplate("modules/agent/macro.twig", "modules/agent/pages/single/single.twig", 2);
        // line 1
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "  ";
        $context["agent"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent", array());
        // line 9
        echo "  ";
        if ( !call_user_func_array($this->env->getFunction('is_ajax')->getCallable(), array())) {
            // line 10
            echo "    <div class=\"site site--main\">
    ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "page_header", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method"), "html", null, true);
            echo "
    <div class=\"site__main\">
  ";
        }
        // line 14
        echo "
  ";
        // line 15
        if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "hide_agent_info", array())) {
            // line 16
            echo "    ";
            $this->loadTemplate("modules/agent/pages/single/includes/agent-info.twig", "modules/agent/pages/single/single.twig", 16)->display($context);
            // line 17
            echo "  ";
        }
        // line 18
        echo "
  ";
        // line 20
        echo "    ";
        // line 21
        echo "  ";
        // line 22
        echo "
  ";
        // line 23
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "properties", array())) {
            // line 24
            echo "    ";
            $this->loadTemplate("modules/agent/pages/single/includes/custom-agent-properties.twig", "modules/agent/pages/single/single.twig", 24)->display($context);
            // line 25
            echo "  ";
        }
        // line 26
        echo "
  ";
        // line 27
        if ( !call_user_func_array($this->env->getFunction('is_ajax')->getCallable(), array())) {
            // line 28
            echo "    </div>
    </div>
  ";
        }
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/agent/pages/single/single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 31,  82 => 28,  80 => 27,  77 => 26,  74 => 25,  71 => 24,  69 => 23,  66 => 22,  64 => 21,  62 => 20,  59 => 18,  56 => 17,  53 => 16,  51 => 15,  48 => 14,  42 => 11,  39 => 10,  36 => 9,  33 => 8,  30 => 7,  26 => 1,  24 => 2,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends is_ajax() ? 'base-ajax.twig' : 'base-archive.twig' %}
{% import 'modules/agent/macro.twig' as agent_macro %}

{# @var page \\cf47\\theme\\realtyspace\\module\\agent\\viewmodel\\SingleViewModel #}
{# @var agent \\cf47\\theme\\realtyspace\\module\\agent\\Entity #}

{% block content %}
  {% set agent = page.agent %}
  {% if not is_ajax() %}
    <div class=\"site site--main\">
    {{ macro.page_header(page) }}
    <div class=\"site__main\">
  {% endif %}

  {% if not page.hide_agent_info %}
    {% include 'modules/agent/pages/single/includes/agent-info.twig' %}
  {% endif %}

  {# if not page.hide_properties #}
    {# include 'modules/agent/pages/single/includes/agent-properties.twig' #}
  {# endif #}

  {% if page.properties %}
    {% include 'modules/agent/pages/single/includes/custom-agent-properties.twig' %}
  {% endif %}

  {% if not is_ajax() %}
    </div>
    </div>
  {% endif %}

{% endblock %}
", "modules/agent/pages/single/single.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/pages/single/single.twig");
    }
}
