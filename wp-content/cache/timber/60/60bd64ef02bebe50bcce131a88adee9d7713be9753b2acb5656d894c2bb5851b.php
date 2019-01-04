<?php

/* modules/property/misc/map-tooltip.twig */
class __TwigTemplate_279f122ea8c7a5cfb3ba8ea335cfc1240fcecb86cf6adfe252eab45e34db6e6c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("modules/core/js-template/layout.twig", "modules/property/misc/map-tooltip.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "modules/core/js-template/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "  <div class=\"map__infobox map__infobox--\${ theme }\">
    <span class=\"map__address\">\${ address }</span>
    <div class=\"map__info\">
      <img class=\"map__photo\" src=\"\${ image }\">
      <div class=\"map__details\">
        <% if(type){ %>
        <dl>
          <dt>";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Type", "realtyspace")), "html", null, true);
        echo ":</dt>
          <dd>\${ type }</dd>
        </dl>
        <% } %>
        <% if(area){ %>
        <dl>
          <dt>";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Area", "realtyspace")), "html", null, true);
        echo ":</dt>
          <dd>\${ area }</dd>
        </dl>
        <% } %>
        <% if(bedrooms){ %>
        <dl>
          <dt>";
        // line 22
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
        echo ":</dt>
          <dd>\${ bedrooms }</dd>
        </dl>
        <% } %>
      </div>
    </div>
    <span class=\"map__price\"><strong>\${ price }</strong></span>
    <a class=\"map__more\" href=\"\${ url }\">";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Details", "realtyspace")), "html", null, true);
        echo "</a>
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/property/misc/map-tooltip.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 29,  58 => 22,  49 => 16,  40 => 10,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"modules/core/js-template/layout.twig\" %}
{% block content %}
  <div class=\"map__infobox map__infobox--\${ theme }\">
    <span class=\"map__address\">\${ address }</span>
    <div class=\"map__info\">
      <img class=\"map__photo\" src=\"\${ image }\">
      <div class=\"map__details\">
        <% if(type){ %>
        <dl>
          <dt>{{ __('Type', 'realtyspace') }}:</dt>
          <dd>\${ type }</dd>
        </dl>
        <% } %>
        <% if(area){ %>
        <dl>
          <dt>{{ __('Area', 'realtyspace') }}:</dt>
          <dd>\${ area }</dd>
        </dl>
        <% } %>
        <% if(bedrooms){ %>
        <dl>
          <dt>{{ __('Bedrooms', 'realtyspace') }}:</dt>
          <dd>\${ bedrooms }</dd>
        </dl>
        <% } %>
      </div>
    </div>
    <span class=\"map__price\"><strong>\${ price }</strong></span>
    <a class=\"map__more\" href=\"\${ url }\">{{ __('Details', 'realtyspace') }}</a>
  </div>
{% endblock %}

", "modules/property/misc/map-tooltip.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/misc/map-tooltip.twig");
    }
}
