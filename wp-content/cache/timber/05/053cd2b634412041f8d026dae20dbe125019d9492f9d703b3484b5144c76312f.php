<?php

/* /modules/property/shortcodes/search-bar.twig */
class __TwigTemplate_a4f710ee62a070065298fb5f36b7dbcfcd00a71e6e82ab7b7eceb2ef16672d4a extends Twig_Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, (isset($context["form_link"]) ? $context["form_link"] : null), "html", null, true);
        echo "\" class=\"form form--search js-search-form form--banner-sidebar form--light form--slider\" method=\"get\">
";
        // line 3
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget', array("attr" => array("class" => "row")));
        echo "
<div class=\"row form__buttons\">
  <button type=\"submit\" class=\"form__submit\">";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search", "realtyspace")), "html", null, true);
        echo "</button>
</div>
";
        // line 7
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "/modules/property/shortcodes/search-bar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 7,  29 => 5,  24 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/modules/property/shortcodes/search-bar.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/property/shortcodes/search-bar.twig");
    }
}
