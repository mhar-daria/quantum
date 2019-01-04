<?php

/* modules/post/widgets/recent-posts/widget.twig */
class __TwigTemplate_37066883bc35b277b56675238513398bf9b0d00a4a0b8e975d44367845a90907 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("widget.twig", "modules/post/widgets/recent-posts/widget.twig", 2);
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
        $context["__internal_06332db91b6768b8bd6e7425bca145b052ec0b314eb3c7a25c67f572a983b976"] = $this->loadTemplate("macro.twig", "modules/post/widgets/recent-posts/widget.twig", 1);
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "  ";
        echo $context["__internal_06332db91b6768b8bd6e7425bca145b052ec0b314eb3c7a25c67f572a983b976"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "  <div class=\" article article--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo "\">
    <!-- end of block .article__header-->
    <div class=\"listing listing--";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo " js-data-container\">
      ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 13
            echo "        <div class=\"listing__item\">
          <div class=\"article__item\">
            <div class=\"article__details\">
              <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "link", array()), "html", null, true);
            echo "\" class=\"article__item-title\">
                ";
            // line 17
            echo $this->getAttribute($context["post"], "title", array());
            echo "
              </a>
              <time datetime=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date", array(0 => "Y-m-d"), "method"), "html", null, true);
            echo "\" class=\"article__time\">
                ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date", array(0 => "D - j M - g:i a"), "method"), "html", null, true);
            echo "
              </time>
              ";
            // line 22
            if (($this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()) != "footer")) {
                // line 23
                echo "                <div class=\"article__intro\">
                  <p>";
                // line 24
                echo $this->getAttribute($context["post"], "preview", array(0 => 20, 1 => true, 2 => false), "method");
                echo "</p>
                </div>
                <a href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "link", array()), "html", null, true);
                echo "\" class=\"article__more\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Read more", "realtyspace")), "html", null, true);
                echo "</a>
              ";
            }
            // line 28
            echo "            </div>
          </div>
          <!-- end of block .article__item-->
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    </div>
    <!-- end of block .article__list-->
    ";
        // line 35
        if (($this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()) == "footer")) {
            // line 36
            echo "      <a href=\"";
            echo call_user_func_array($this->env->getFunction('archive_path')->getCallable(), array("post"));
            echo "\" class=\"widget__more js-loadmore\"> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("More articles", "realtyspace")), "html", null, true);
            echo "</a>
    ";
        }
        // line 38
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/post/widgets/recent-posts/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 38,  115 => 36,  113 => 35,  109 => 33,  99 => 28,  92 => 26,  87 => 24,  84 => 23,  82 => 22,  77 => 20,  73 => 19,  68 => 17,  64 => 16,  59 => 13,  55 => 12,  51 => 11,  45 => 9,  42 => 8,  35 => 5,  32 => 4,  28 => 2,  26 => 1,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% from 'macro.twig' import widget_header %}
{% extends 'widget.twig' %}

{% block header %}
  {{ widget_header(title, subtext, widget.modifier) }}
{% endblock %}

{% block content %}
  <div class=\" article article--{{ widget.modifier }}\">
    <!-- end of block .article__header-->
    <div class=\"listing listing--{{ widget.modifier }} js-data-container\">
      {% for post in posts %}
        <div class=\"listing__item\">
          <div class=\"article__item\">
            <div class=\"article__details\">
              <a href=\"{{ post.link }}\" class=\"article__item-title\">
                {{ post.title|raw }}
              </a>
              <time datetime=\"{{ post.date('Y-m-d') }}\" class=\"article__time\">
                {{ post.date('D - j M - g:i a') }}
              </time>
              {% if widget.modifier != 'footer' %}
                <div class=\"article__intro\">
                  <p>{{ post.preview(20, true, false)|raw }}</p>
                </div>
                <a href=\"{{ post.link }}\" class=\"article__more\">{{ __('Read more', 'realtyspace') }}</a>
              {% endif %}
            </div>
          </div>
          <!-- end of block .article__item-->
        </div>
      {% endfor %}
    </div>
    <!-- end of block .article__list-->
    {% if widget.modifier == 'footer' %}
      <a href=\"{{ archive_path('post') }}\" class=\"widget__more js-loadmore\"> {{ __('More articles', 'realtyspace') }}</a>
    {% endif %}

  </div>
{% endblock %}", "modules/post/widgets/recent-posts/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/post/widgets/recent-posts/widget.twig");
    }
}
