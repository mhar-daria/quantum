<?php

/* modules/agent/includes/list.twig */
class __TwigTemplate_e558e227629f0b75ab17b9bfb197e8c8c4320eae76fb6549b0fb893d06693863 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/agent/includes/list.twig", 3);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "section-widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_6c9c30f45d78f13bb46a0b4d2125bfd591e1abbfc8d74c510ed54f2b95abe383"] = $this->loadTemplate("modules/agent/macro.twig", "modules/agent/includes/list.twig", 1);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "  <div class=\"js-agents-ajax\">
    <div class=\"listing listing--";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "display_mode", array()), "html", null, true);
        echo " worker--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "display_mode", array()), "html", null, true);
        echo "\">
      ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "items", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["agent"]) {
            // line 9
            echo "        ";
            echo $context["__internal_6c9c30f45d78f13bb46a0b4d2125bfd591e1abbfc8d74c510ed54f2b95abe383"]->getagent_item($context["agent"], $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "display_mode", array()));
            echo "
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </div>
    <div class=\"clearfix\"></div>
    ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "pagination", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "pagination", array()), 1 => ".js-agents-ajax"), "method"), "html", null, true);
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/agent/includes/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 13,  56 => 11,  47 => 9,  43 => 8,  37 => 7,  34 => 6,  31 => 5,  27 => 3,  25 => 1,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/includes/list.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/agent/includes/list.twig");
    }
}
