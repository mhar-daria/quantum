<?php

/* modules/property/sections/hero.twig */
class __TwigTemplate_dab34dd4ff79e79e89d37593f5886be643c451c8bcee4ffd6f2b19978f48cf72 extends Twig_Template
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
        $context["__internal_d8f95b2252df563eda5a3059159847ad9a70a6a78f0b5d8effb170b0bc064d87"] = $this->loadTemplate("macro.twig", "modules/property/sections/hero.twig", 11);
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
              <form action=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "form_link", array()), "html", null, true);
            echo "\" class=\"form form--search js-search-form form--banner-sidebar form--light form--slider\" method=\"get\">
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
        return array (  151 => 69,  145 => 66,  140 => 64,  134 => 62,  130 => 60,  127 => 59,  121 => 56,  118 => 55,  116 => 54,  112 => 53,  108 => 51,  102 => 48,  96 => 44,  94 => 43,  76 => 30,  72 => 29,  68 => 28,  56 => 19,  48 => 16,  45 => 15,  42 => 14,  38 => 12,  36 => 11,  34 => 10,  32 => 8,  31 => 7,  30 => 6,  29 => 5,  28 => 4,  27 => 3,  25 => 2,  11 => 12,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/sections/hero.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/property/sections/hero.twig");
    }
}
