<?php

/* modules/agent/widgets/agent-list/widget.twig */
class __TwigTemplate_022394896ab268fd241553bb131615ddee76e066f5efd16426a2d854dc64f7e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("widget.twig", "modules/agent/widgets/agent-list/widget.twig", 3);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_99006db5ab0a5e37e6672a16ceaee8825878e37c3b825e250c31a5ec2250b2dd"] = $this->loadTemplate("macro.twig", "modules/agent/widgets/agent-list/widget.twig", 1);
        // line 2
        $context["__internal_a75da17b9d1a3453a55e801f4b73cd7d6045af8fd6a6f69ba8b3904d1ab9f20e"] = $this->loadTemplate("modules/agent/macro.twig", "modules/agent/widgets/agent-list/widget.twig", 2);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        echo $context["__internal_99006db5ab0a5e37e6672a16ceaee8825878e37c3b825e250c31a5ec2250b2dd"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <div class=\"listing listing--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo " worker worker--sidebar-list js-data-container\">
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["agents"]) ? $context["agents"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["agent"]) {
            // line 12
            echo "      ";
            echo $context["__internal_a75da17b9d1a3453a55e801f4b73cd7d6045af8fd6a6f69ba8b3904d1ab9f20e"]->getagent_item_short($context["agent"], (isset($context["is_wide"]) ? $context["is_wide"] : null));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/agent/widgets/agent-list/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 14,  56 => 12,  52 => 11,  47 => 10,  44 => 9,  37 => 6,  34 => 5,  30 => 3,  28 => 2,  26 => 1,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/widgets/agent-list/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/agent/widgets/agent-list/widget.twig");
    }
}
