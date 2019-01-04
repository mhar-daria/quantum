<?php

/* modules/agent/pages/single/includes/agent-properties.twig */
class __TwigTemplate_cdcb568cd19a473f542389d66b78a8846d48edb42b5f019947bf988a0edb3f88 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/agent/pages/single/includes/agent-properties.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "section-widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_d164dc335d736c75baa357bc77be7f808bb769bb577a2cf8587bd158f38d5bfb"] = $this->loadTemplate("macro.twig", "modules/agent/pages/single/includes/agent-properties.twig", 2);
        // line 4
        $context["widget_class"] = "main";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_header($context, array $blocks = array())
    {
        // line 7
        echo "  ";
        echo $context["__internal_d164dc335d736c75baa357bc77be7f808bb769bb577a2cf8587bd158f38d5bfb"]->getwidget_header(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent Listings", "realtyspace")));
        echo "
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  ";
        $context["__internal_e63f1e50317e1fee01b36f43a668ebdafbf85f7d2a5b89e6e300186af3bed331"] = $this->loadTemplate("macro.twig", "modules/agent/pages/single/includes/agent-properties.twig", 11);
        // line 12
        echo "  ";
        $context["__internal_d5c5a76d185a5184c19f6c409a423e682bbc2d9ad3db59503c2185388b7f640a"] = $this->loadTemplate("modules/property/macro.twig", "modules/agent/pages/single/includes/agent-properties.twig", 12);
        // line 13
        echo "  <div class=\"listing listing--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()), "html", null, true);
        echo " listing--lg-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_grid_size", array()), "html_attr");
        echo " properties properties--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()), "html", null, true);
        echo " js-ajax-container\">
    ";
        // line 14
        $context["data"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties", array());
        // line 15
        echo "    ";
        echo $context["__internal_d5c5a76d185a5184c19f6c409a423e682bbc2d9ad3db59503c2185388b7f640a"]->getitems($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "items", array()), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_properties_display_mode", array()));
        echo "
  </div>

  ";
        // line 18
        echo $context["__internal_e63f1e50317e1fee01b36f43a668ebdafbf85f7d2a5b89e6e300186af3bed331"]->getpagination($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pagination", array()));
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/agent/pages/single/includes/agent-properties.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 18,  64 => 15,  62 => 14,  53 => 13,  50 => 12,  47 => 11,  44 => 10,  37 => 7,  34 => 6,  30 => 1,  28 => 4,  26 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/pages/single/includes/agent-properties.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/pages/single/includes/agent-properties.twig");
    }
}
