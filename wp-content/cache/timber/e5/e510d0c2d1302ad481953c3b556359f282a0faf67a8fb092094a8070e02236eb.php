<?php

/* modules/agent/archive.twig */
class __TwigTemplate_b06cae76ff96a4812d234b17afd617e828a62f6f6df024d8dfe9286a6f1d60ee extends Twig_Template
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
        return $this->loadTemplate(((call_user_func_array($this->env->getFunction('is_ajax')->getCallable(), array())) ? ("base-ajax.twig") : ("base-archive.twig")), "modules/agent/archive.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        // line 5
        echo "  <!-- BEGIN LISTING-->
  ";
        // line 6
        if (call_user_func_array($this->env->getFunction('is_ajax')->getCallable(), array())) {
            // line 7
            echo "    ";
            echo twig_include($this->env, $context, "modules/agent/includes/list.twig");
            echo "
  ";
        } else {
            // line 9
            echo "    <div class=\"site site--main \">
      ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "page_header", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method"), "html", null, true);
            echo "
      <div class=\"site__main\">
        ";
            // line 12
            echo twig_include($this->env, $context, "modules/agent/includes/list.twig");
            echo "
      </div>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "modules/agent/archive.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 12,  46 => 10,  43 => 9,  37 => 7,  35 => 6,  32 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/archive.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/agent/archive.twig");
    }
}
