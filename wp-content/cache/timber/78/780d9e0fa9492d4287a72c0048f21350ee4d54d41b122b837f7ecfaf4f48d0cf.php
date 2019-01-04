<?php

/* modules/social/widgets/social-links/widget.twig */
class __TwigTemplate_d74e155e75b073188400be3df9a07984e61860d34ff86528a2c00569ea55a345 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("widget.twig", "modules/social/widgets/social-links/widget.twig", 3);
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
        $context["__internal_3ed6b8d64ade8fc7146450b57bbbb0a09b9ff26c0170b70701e88754b863d875"] = $this->loadTemplate("macro.twig", "modules/social/widgets/social-links/widget.twig", 1);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        echo $context["__internal_3ed6b8d64ade8fc7146450b57bbbb0a09b9ff26c0170b70701e88754b863d875"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <div class=\"social social--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo "\">
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 12
            echo "      <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "link", array()), "html", null, true);
            echo "\" class=\"social__item\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "\">
        ";
            // line 13
            echo $context["__internal_3ed6b8d64ade8fc7146450b57bbbb0a09b9ff26c0170b70701e88754b863d875"]->getfa_icon($this->getAttribute($context["service"], "icon", array()));
            echo "
      </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/social/widgets/social-links/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 16,  61 => 13,  54 => 12,  50 => 11,  45 => 10,  42 => 9,  35 => 6,  32 => 5,  28 => 3,  26 => 1,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/social/widgets/social-links/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/social/widgets/social-links/widget.twig");
    }
}
