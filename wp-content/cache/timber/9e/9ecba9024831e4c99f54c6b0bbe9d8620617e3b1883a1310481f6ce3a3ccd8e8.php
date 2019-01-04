<?php

/* views/modules/comments/comments.twig */
class __TwigTemplate_2d4b15cd852ee3d89e439b42b78ecb2921dd1ee7eb4753cb49873f6a3dc92b14 extends Twig_Template
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
        // line 2
        $context["macro"] = $this->loadTemplate("macro.twig", "views/modules/comments/comments.twig", 2);
        // line 3
        echo "
";
        // line 4
        if ((isset($context["comments_open"]) ? $context["comments_open"] : null)) {
            // line 5
            echo "<div class=\"comment\" id=\"comments\">
  <h3 class=\"comment__headline\">";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["comments_title"]) ? $context["comments_title"] : null), "html", null, true);
            echo "</h3>
  <div class=\"comment__wrap\">
    <ul class=\"comment__list\">
      ";
            // line 9
            echo (isset($context["comment_list"]) ? $context["comment_list"] : null);
            echo "
    </ul>
    <div class=\"comment__footer\">
      ";
            // line 12
            if (((isset($context["show_navigation"]) ? $context["show_navigation"] : null) && ((isset($context["previous_page"]) ? $context["previous_page"] : null) || (isset($context["next_page"]) ? $context["next_page"] : null)))) {
                // line 13
                echo "        <!-- BEGIN PAGINATION-->
        <nav class=\"listing__pagination\">
          <ul class=\"pagination-custom\">
            ";
                // line 16
                if ((isset($context["previous_page"]) ? $context["previous_page"] : null)) {
                    // line 17
                    echo "              <li>
                ";
                    // line 18
                    echo (isset($context["previous_page"]) ? $context["previous_page"] : null);
                    echo "
              </li>
            ";
                }
                // line 21
                echo "            ";
                if ((isset($context["next_page"]) ? $context["next_page"] : null)) {
                    // line 22
                    echo "              <li>
                ";
                    // line 23
                    echo (isset($context["next_page"]) ? $context["next_page"] : null);
                    echo "
              </li>
            ";
                }
                // line 26
                echo "          </ul>
        </nav>
        <!-- END PAGINATION-->
      ";
            }
            // line 30
            echo "
      ";
            // line 31
            if ( !(isset($context["reply_form"]) ? $context["reply_form"] : null)) {
                // line 32
                echo "        <div class=\"no-items\">
          <div class=\"no-items__icon no-items__icon--svg\">
            <svg>
              <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-noitems\"></use>
            </svg>
          </div>
          <span class=\"no-items__title\">";
                // line 38
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Comments are closed", "realtyspace")), "html", null, true);
                echo "</span>
        </div>
      ";
            }
            // line 41
            echo "      ";
            echo (isset($context["reply_form"]) ? $context["reply_form"] : null);
            echo "
    </div>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "views/modules/comments/comments.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 41,  90 => 38,  82 => 32,  80 => 31,  77 => 30,  71 => 26,  65 => 23,  62 => 22,  59 => 21,  53 => 18,  50 => 17,  48 => 16,  43 => 13,  41 => 12,  35 => 9,  29 => 6,  26 => 5,  24 => 4,  21 => 3,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var show_navigation #}
{% import 'macro.twig' as macro %}

{% if comments_open %}
<div class=\"comment\" id=\"comments\">
  <h3 class=\"comment__headline\">{{ comments_title }}</h3>
  <div class=\"comment__wrap\">
    <ul class=\"comment__list\">
      {{ comment_list|raw }}
    </ul>
    <div class=\"comment__footer\">
      {% if show_navigation and (previous_page or next_page) %}
        <!-- BEGIN PAGINATION-->
        <nav class=\"listing__pagination\">
          <ul class=\"pagination-custom\">
            {% if previous_page %}
              <li>
                {{ previous_page|raw }}
              </li>
            {% endif %}
            {% if next_page %}
              <li>
                {{ next_page|raw }}
              </li>
            {% endif %}
          </ul>
        </nav>
        <!-- END PAGINATION-->
      {% endif %}

      {% if not reply_form %}
        <div class=\"no-items\">
          <div class=\"no-items__icon no-items__icon--svg\">
            <svg>
              <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-noitems\"></use>
            </svg>
          </div>
          <span class=\"no-items__title\">{{ __('Comments are closed', 'realtyspace') }}</span>
        </div>
      {% endif %}
      {{ reply_form|raw }}
    </div>
  </div>
</div>
{% endif %}", "views/modules/comments/comments.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/comments/comments.twig");
    }
}
