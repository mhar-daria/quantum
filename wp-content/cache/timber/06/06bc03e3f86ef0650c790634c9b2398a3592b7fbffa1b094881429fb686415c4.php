<?php

/* modules/property/widgets/property-filter/widget.twig */
class __TwigTemplate_4f17fc13db1073369d86a5b2b6367670b43d676afb584495c01e640d121c7adc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("widget.twig", "modules/property/widgets/property-filter/widget.twig", 2);
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
        $context["__internal_803422a3f171891b4a2db72d82a2d7cfc03afc99c80a685d195fb0960343bf21"] = $this->loadTemplate("macro.twig", "modules/property/widgets/property-filter/widget.twig", 1);
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "  ";
        echo $context["__internal_803422a3f171891b4a2db72d82a2d7cfc03afc99c80a685d195fb0960343bf21"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "  ";
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("widget_id" => (isset($context["widget_id"]) ? $context["widget_id"] : null), "attr" => array("class" => ("form form--search js-search-form form--" . $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array())))));
        echo "

  ";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget', array("attr" => array("class" => "row")));
        echo "

  <div class=\"row form__buttons form__buttons--double\">
    <button type=\"reset\" class=\"form__reset js-form-reset\">";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Reset", "realtyspace")), "html", null, true);
        echo "</button>
    <button type=\"submit\" class=\"form__submit\">";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search", "realtyspace")), "html", null, true);
        echo "</button>
  </div>
  ";
        // line 17
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/property/widgets/property-filter/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 17,  61 => 15,  57 => 14,  51 => 11,  45 => 9,  42 => 8,  35 => 5,  32 => 4,  28 => 2,  26 => 1,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/widgets/property-filter/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/widgets/property-filter/widget.twig");
    }
}
