<?php

/* modules/partner/section.twig */
class __TwigTemplate_e85e281e9f8107771bfa3a749a04527a120e1df001ea4243e71d7a6474010fd2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 4
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/partner/section.twig", 4);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
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
        $context["__internal_40934f6cca66504ad0d708bfbcd0ac7c8f5739228adc4876fdd74fd13098199a"] = $this->loadTemplate("macro.twig", "modules/partner/section.twig", 1);
        // line 6
        $context["widget_class"] = "landing partners-section";
        // line 4
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_header($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        echo $context["__internal_40934f6cca66504ad0d708bfbcd0ac7c8f5739228adc4876fdd74fd13098199a"]->getwidget_header($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "subtitle", array()));
        echo "
  ";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "    <!-- BEGIN PARTNERS-->
    ";
        // line 14
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "items", array())) {
            // line 15
            echo "      <div class=\"partners\" id=\"";
            echo call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("partners", array("animate" => true, "slidesToShow" => $this->getAttribute(            // line 17
(isset($context["section"]) ? $context["section"] : null), "slides_to_show", array()))));
            // line 18
            echo "\">
        <div class=\"partners__slider js-slick-slider\">
          ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "items", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["partner"]) {
                // line 21
                echo "            <a class=\"partners__item\" ";
                if ($this->getAttribute($context["partner"], "url", array())) {
                    echo "href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["partner"], "url", array()), "html", null, true);
                    echo "\"";
                }
                echo ">
              ";
                // line 22
                echo $context["__internal_40934f6cca66504ad0d708bfbcd0ac7c8f5739228adc4876fdd74fd13098199a"]->getthumbnail($this->getAttribute($this->getAttribute($context["partner"], "image", array()), "src", array()), 175, 50);
                echo "
              <span class=\"partners__name\">";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["partner"], "title", array()), "html", null, true);
                echo "</span>
            </a>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "        </div>
        <div class=\"partners__controls\">
          <button class=\"partners__arrow partners__arrow--prev js-partners-prev\"></button>
          <button class=\"partners__arrow partners__arrow--next js-partners-next\"></button>
        </div>
        <!-- end of block .partners__controls-->
      </div>
    ";
        } else {
            // line 34
            echo "      <div class=\"partners__list\">
        ";
            // line 35
            echo $context["__internal_40934f6cca66504ad0d708bfbcd0ac7c8f5739228adc4876fdd74fd13098199a"]->getno_items_available();
            echo "
      </div>
    ";
        }
        // line 38
        echo "    <!-- end of block .partners-->
    <!-- END PARTNERS-->
  ";
    }

    public function getTemplateName()
    {
        return "modules/partner/section.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 38,  99 => 35,  96 => 34,  86 => 26,  77 => 23,  73 => 22,  64 => 21,  60 => 20,  56 => 18,  54 => 17,  52 => 15,  50 => 14,  47 => 13,  44 => 12,  37 => 9,  34 => 8,  30 => 4,  28 => 6,  26 => 1,  11 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% from 'macro.twig' import widget_header, thumbnail, no_items_available %}
{# @var section \\cf47\\plugin\\realtyspace\\module\\partner\\section\\PartnersView #}

{% extends 'section-widget.twig' %}

{% set widget_class='landing partners-section' %}

  {% block header %}
    {{ widget_header(section.title, section.subtitle) }}
  {% endblock %}

  {% block content %}
    <!-- BEGIN PARTNERS-->
    {% if section.items %}
      <div class=\"partners\" id=\"{{ js_module('partners', {
        'animate': true,
        'slidesToShow': section.slides_to_show
      }) }}\">
        <div class=\"partners__slider js-slick-slider\">
          {% for partner in section.items %}
            <a class=\"partners__item\" {% if partner.url %}href=\"{{ partner.url }}\"{% endif %}>
              {{ thumbnail(partner.image.src, 175, 50) }}
              <span class=\"partners__name\">{{ partner.title }}</span>
            </a>
          {% endfor %}
        </div>
        <div class=\"partners__controls\">
          <button class=\"partners__arrow partners__arrow--prev js-partners-prev\"></button>
          <button class=\"partners__arrow partners__arrow--next js-partners-next\"></button>
        </div>
        <!-- end of block .partners__controls-->
      </div>
    {% else %}
      <div class=\"partners__list\">
        {{ no_items_available() }}
      </div>
    {% endif %}
    <!-- end of block .partners-->
    <!-- END PARTNERS-->
  {% endblock %}", "modules/partner/section.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/partner/section.twig");
    }
}
