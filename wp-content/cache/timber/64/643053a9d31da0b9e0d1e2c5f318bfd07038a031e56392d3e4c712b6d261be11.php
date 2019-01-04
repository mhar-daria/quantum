<?php

/* modules/core/includes/not-found.twig */
class __TwigTemplate_e83f4653a4ebe13b7958e33c0c1cc089820083ed66da23a5077f12c422afc2f1 extends Twig_Template
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
        echo "<div class=\"center\">
  <div class=\"container\">

    <div class=\"widget js-widget widget--landing\">
      <div class=\"widget__conent\">
        <div class=\"form form--error-status\">
          ";
        // line 7
        echo call_user_func_array($this->env->getFunction('search_form')->getCallable(), array());
        echo "
        </div>
      </div>
    </div>
    <div class=\"widget js-widget widget--landing widget--sep\">
      <header class=\"widget__header\">
        <h1 class=\"widget__title\">
          ";
        // line 14
        echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : null), call_user_func_array($this->env->getFunction('__')->getCallable(), array("Nothing Found", "realtyspace")))) : (call_user_func_array($this->env->getFunction('__')->getCallable(), array("Nothing Found", "realtyspace")))), "html", null, true);
        echo "
        </h1>
        ";
        // line 16
        if ((isset($context["subtitle"]) ? $context["subtitle"] : null)) {
            // line 17
            echo "          <h2 class=\"widget__headline\">
            ";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["subtitle"]) ? $context["subtitle"] : null), "html", null, true);
            echo "
          </h2>
        ";
        }
        // line 21
        echo "      </header>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/core/includes/not-found.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 21,  47 => 18,  44 => 17,  42 => 16,  37 => 14,  27 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/core/includes/not-found.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/core/includes/not-found.twig");
    }
}
