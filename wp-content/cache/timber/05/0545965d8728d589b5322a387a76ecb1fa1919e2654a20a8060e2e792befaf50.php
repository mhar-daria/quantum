<?php

/* modules/property/sections/hero.twig */
class __TwigTemplate_52fa36ba0076a70ce2ac27347131224f931e79e95345bba4379d9c7e16a9b884 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/property/sections/hero.twig", 12);
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
        // line 2
        $context["tooltip_template_id"] = call_user_func_array($this->env->getFunction('js_template')->getCallable(), array("property-map-tooltip", "modules/property/misc/map-tooltip.twig"));
        // line 3
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("hero", array("infoboxTemplate" =>         // line 4
(isset($context["tooltip_template_id"]) ? $context["tooltip_template_id"] : null), "theme" => $this->getAttribute(        // line 5
(isset($context["section"]) ? $context["section"] : null), "map_infobox_theme", array()), "fullscreen" => $this->getAttribute(        // line 6
(isset($context["section"]) ? $context["section"] : null), "fullscreen", array()), "mapEnabled" => $this->getAttribute(        // line 7
(isset($context["section"]) ? $context["section"] : null), "map_enabled", array()), "animate" => $this->getAttribute(        // line 8
(isset($context["section"]) ? $context["section"] : null), "animation_disabled", array()))));
        // line 10
        $context["form"] = $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "search_form", array());
        // line 11
        $context["__internal_beb31298e37ef186e42eeacc60275f72ed7f2809b1db5e1ffab26a1766411619"] = $this->loadTemplate("macro.twig", "modules/property/sections/hero.twig", 11);
        // line 12
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "  <div class=\"banner banner--wide\">
    <div class=\"banner__item\" ";
        // line 16
        if (( !$this->getAttribute((isset($context["section"]) ? $context["section"] : null), "background_image", array()) &&  !$this->getAttribute((isset($context["section"]) ? $context["section"] : null), "is_vc", array()))) {
            echo "style=\"background-color: #2C3E50;\" ";
        }
        echo ">
      <div class=\"map map--index map--banner\">
        <div class=\"map__buttons\">
          <button type=\"button\" class=\"map__change-map js-map-btn\">";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property Map", "realtyspace")), "html", null, true);
        echo "</button>
        </div>
        <div class=\"map__wrap\">
          <div data-infobox-theme=\"white\" class=\"map__view js-map-index-canvas\"></div>
        </div>
      </div>
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"banner__caption\">
            <h1 class=\"banner__title\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), "html", null, true);
        echo "</h1>
            <h3 class=\"banner__subtitle\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "subtitle", array()), "html", null, true);
        echo "</h3>
            <span class=\"banner__btn ";
        // line 30
        echo (($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "animation_disabled", array())) ? ("is-static") : (""));
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "action_text", array()), "html", null, true);
        echo "</span>
            <div class=\"banner__arrow-circle\">•</div>
            <svg class=\"banner__arrow-end js-arrow-end\">
              <use xlink:href=\"#icon-arrow-end\"></use>
            </svg>
            <div class=\"banner__arrow\">
              <svg class=\"js-banner-line\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
                   viewBox=\"0 0 774 284\" enable-background=\"new 0 0 774 284\" xml:space=\"preserve\">
                          <path fill=\"none\" stroke-width=\"2\" stroke-miterlimit=\"10\" stroke-dasharray=\"0,2004.009\" d=\"M220.6,239.6
                          c-3.6-15.5-17.5-27.1-34.1-27.1h-150c-19.3,0-35,15.7-35,35c0,19.3,15.7,35,35,35c0,0,88,0,150,0c169,0,244.9-7.5,291-19
                          c41.3-10.2,114.1-33.7,118-83c4.2-53.5-59.4-67.5-102-54c-47.2,15-52.3,78.2,1,90c58.1,12.9,169.6-53.6,274.7-210\"/>
                        </svg>
            </div>
            ";
        // line 43
        if ( !twig_test_empty($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "scroll_text", array()))) {
            // line 44
            echo "              <div class=\"banner__scroll-down\">
                <svg class=\"banner__scroll-svg\">
                  <use xlink:href=\"#icon-scroll-down\"></use>
                </svg>
                <div class=\"banner__scroll-text\">";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "scroll_text", array()), "html", null, true);
            echo "</div>
              </div>
            ";
        }
        // line 51
        echo "          </div>
          <div class=\"banner__search\">
            <h4 class=\"banner__sidebar-title\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), "html", null, true);
        echo "</h4>
            ";
        // line 54
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "show_form_shortcode", array())) {
            // line 55
            echo "              <div class=\"form  js-search-form form--light form--banner-sidebar\">
                ";
            // line 56
            echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "form_shortcode", array());
            echo "
              </div>
            ";
        } else {
            // line 59
            echo "              <!-- BEGIN SEARCH-->
              <form action=\"/property-for-buy-in-dubai/\" class=\"form form--search js-search-form form--banner-sidebar form--light form--slider\" method=\"get\">
              ";
            // line 62
            echo "              ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget', array("attr" => array("class" => "row")));
            echo "
              <div class=\"row form__buttons\">
                <button type=\"submit\" class=\"form__submit\">";
            // line 64
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search", "realtyspace")), "html", null, true);
            echo "</button>
              </div>
              ";
            // line 66
            echo             $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
            echo "
              <!-- END SEARCH-->
            ";
        }
        // line 69
        echo "          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/property/sections/hero.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 69,  142 => 66,  137 => 64,  131 => 62,  127 => 59,  121 => 56,  118 => 55,  116 => 54,  112 => 53,  108 => 51,  102 => 48,  96 => 44,  94 => 43,  76 => 30,  72 => 29,  68 => 28,  56 => 19,  48 => 16,  45 => 15,  42 => 14,  38 => 12,  36 => 11,  34 => 10,  32 => 8,  31 => 7,  30 => 6,  29 => 5,  28 => 4,  27 => 3,  25 => 2,  11 => 12,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var section \\cf47\\plugin\\realtyspace\\module\\property\\section\\hero\\HeroView #}
{% set tooltip_template_id = js_template('property-map-tooltip', 'modules/property/misc/map-tooltip.twig') %}
{% set module_id = js_module('hero', {
'infoboxTemplate': tooltip_template_id,
'theme': section.map_infobox_theme,
'fullscreen': section.fullscreen,
'mapEnabled': section.map_enabled,
'animate': section.animation_disabled
}) %}
{% set form = section.search_form %}
{% from 'macro.twig' import thumbnail_src %}
{% extends 'section-widget.twig' %}

{% block content %}
  <div class=\"banner banner--wide\">
    <div class=\"banner__item\" {% if not section.background_image and not section.is_vc %}style=\"background-color: #2C3E50;\" {% endif %}>
      <div class=\"map map--index map--banner\">
        <div class=\"map__buttons\">
          <button type=\"button\" class=\"map__change-map js-map-btn\">{{ __('Property Map', 'realtyspace') }}</button>
        </div>
        <div class=\"map__wrap\">
          <div data-infobox-theme=\"white\" class=\"map__view js-map-index-canvas\"></div>
        </div>
      </div>
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"banner__caption\">
            <h1 class=\"banner__title\">{{ section.title }}</h1>
            <h3 class=\"banner__subtitle\">{{ section.subtitle }}</h3>
            <span class=\"banner__btn {{ section.animation_disabled ?  'is-static' : ''}}\">{{ section.action_text }}</span>
            <div class=\"banner__arrow-circle\">•</div>
            <svg class=\"banner__arrow-end js-arrow-end\">
              <use xlink:href=\"#icon-arrow-end\"></use>
            </svg>
            <div class=\"banner__arrow\">
              <svg class=\"js-banner-line\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
                   viewBox=\"0 0 774 284\" enable-background=\"new 0 0 774 284\" xml:space=\"preserve\">
                          <path fill=\"none\" stroke-width=\"2\" stroke-miterlimit=\"10\" stroke-dasharray=\"0,2004.009\" d=\"M220.6,239.6
                          c-3.6-15.5-17.5-27.1-34.1-27.1h-150c-19.3,0-35,15.7-35,35c0,19.3,15.7,35,35,35c0,0,88,0,150,0c169,0,244.9-7.5,291-19
                          c41.3-10.2,114.1-33.7,118-83c4.2-53.5-59.4-67.5-102-54c-47.2,15-52.3,78.2,1,90c58.1,12.9,169.6-53.6,274.7-210\"/>
                        </svg>
            </div>
            {% if section.scroll_text is not empty %}
              <div class=\"banner__scroll-down\">
                <svg class=\"banner__scroll-svg\">
                  <use xlink:href=\"#icon-scroll-down\"></use>
                </svg>
                <div class=\"banner__scroll-text\">{{ section.scroll_text }}</div>
              </div>
            {% endif %}
          </div>
          <div class=\"banner__search\">
            <h4 class=\"banner__sidebar-title\">{{ section.title }}</h4>
            {% if section.show_form_shortcode %}
              <div class=\"form  js-search-form form--light form--banner-sidebar\">
                {{ section.form_shortcode|raw }}
              </div>
            {% else %}
              <!-- BEGIN SEARCH-->
              <form action=\"/property-for-buy-in-dubai/\" class=\"form form--search js-search-form form--banner-sidebar form--light form--slider\" method=\"get\">
              {# form_start(form, {'attr': {'class': 'form form--search js-search-form form--light form--banner-sidebar'}}) #}
              {{ form_widget(form, {'attr': {'class': 'row'}}) }}
              <div class=\"row form__buttons\">
                <button type=\"submit\" class=\"form__submit\">{{ __('Search', 'realtyspace') }}</button>
              </div>
              {{ form_end(form) }}
              <!-- END SEARCH-->
            {% endif %}
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}", "modules/property/sections/hero.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/property/sections/hero.twig");
    }
}
