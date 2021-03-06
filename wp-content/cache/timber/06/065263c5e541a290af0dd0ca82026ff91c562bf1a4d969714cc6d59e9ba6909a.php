<?php

/* modules/property/archive.twig */
class __TwigTemplate_72fe8bdf985cf5f1c217bc8b6fb6fea7bdbf34d4e24fdbb48f9ddfef64cc4f84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base-archive.twig", "modules/property/archive.twig", 1);
        $this->blocks = array(
            'hero_unit' => array($this, 'block_hero_unit'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base-archive.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_410fbaed6047510ca9a36a5aa38ff880871e75d8f8ef9f78c383b63899815662"] = $this->loadTemplate("macro.twig", "modules/property/archive.twig", 2);
        // line 3
        $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/archive.twig", 3);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_hero_unit($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $this->displayParentBlock("hero_unit", $context, $blocks);
        echo "
    ";
        // line 8
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map_mode", array()) == "hero")) {
            // line 9
            echo "      ";
            echo $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"]->getshow_map("hero");
            echo "
    ";
        }
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "  <!-- BEGIN LISTING-->p
  <div class=\"site site--main\">
    ";
        // line 17
        echo $context["__internal_410fbaed6047510ca9a36a5aa38ff880871e75d8f8ef9f78c383b63899815662"]->getpage_header((isset($context["page"]) ? $context["page"] : null));
        echo "
    ";
        // line 18
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_toolbar", array()) && (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_view", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_limit", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_sorting", array())))) {
            // line 19
            echo "      ";
            $context["helper_form"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "helper_form", array());
            // line 20
            echo "      ";
            echo             $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["helper_form"]) ? $context["helper_form"] : null), 'form_start', array("attr" => array("class" => "form form--filter js-listing-filter")));
            echo "
      <div class=\"row\">
        ";
            // line 22
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_sorting", array())) {
                // line 23
                echo "          ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["helper_form"]) ? $context["helper_form"] : null), "sort", array()), 'row', array("row_class" => "form-group--sorting"));
                echo "
        ";
            }
            // line 25
            echo "
        ";
            // line 26
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_limit", array())) {
                // line 27
                echo "          ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["helper_form"]) ? $context["helper_form"] : null), "limit", array()), 'row', array("row_class" => "form-group--limit"));
                echo "
        ";
            }
            // line 29
            echo "
        ";
            // line 30
            if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_view", array()) && ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_grid_view", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_list_view", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_table_view", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map_view", array())))) {
                // line 31
                echo "          <div class=\"form-group form-group--view\">
            <span class=\"control-label\">";
                // line 32
                echo twig_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('__')->getCallable(), array("View:", "realtyspace"))), "html", null, true);
                echo "</span>
            ";
                // line 33
                if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_grid_view", array())) {
                    // line 34
                    echo "              <a href=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('se_url')->getCallable(), array("mode", "grid")), "html", null, true);
                    echo "\"
                 class=\"btn--white ";
                    // line 35
                    echo (((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) == "grid") ||  !$this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()))) ? ("active") : (""));
                    echo "\">
                <span class=\"fa fa-th-large\"></span>
              </a>
            ";
                }
                // line 39
                echo "            ";
                if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_list_view", array())) {
                    // line 40
                    echo "              <a href=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('se_url')->getCallable(), array("mode", "list")), "html", null, true);
                    echo "\"
                 class=\"btn--white ";
                    // line 41
                    echo ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) == "list")) ? ("active") : (""));
                    echo "\">
                <i class=\"fa fa-bars\"></i>
              </a>
            ";
                }
                // line 45
                echo "            ";
                if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_table_view", array())) {
                    // line 46
                    echo "              <a href=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('se_url')->getCallable(), array("mode", "table")), "html", null, true);
                    echo "\"
                 class=\"btn--white ";
                    // line 47
                    echo ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) == "table")) ? ("active") : (""));
                    echo "\">
                <i class=\"fa fa-table\"></i>
              </a>
            ";
                }
                // line 51
                echo "            ";
                if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map_view", array())) {
                    // line 52
                    echo "              <a href=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('se_url')->getCallable(), array("mode", "map")), "html", null, true);
                    echo "\"
                 class=\"btn--white ";
                    // line 53
                    echo ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) == "map")) ? ("active") : (""));
                    echo "\">
                <i class=\"fa fa-map-marker\"></i>
              </a>
            ";
                }
                // line 57
                echo "          </div>
        ";
            }
            // line 59
            echo "
        ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["helper_form"]) ? $context["helper_form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["collection"]) {
                // line 61
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["collection"]);
                foreach ($context['_seq'] as $context["_key"] => $context["collection_item"]) {
                    // line 62
                    echo "            ";
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["collection_item"], 'widget');
                    echo "
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collection_item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collection'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "
      </div>
      ";
            // line 67
            echo             $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["helper_form"]) ? $context["helper_form"] : null), 'form_end');
            echo "

    ";
        }
        // line 70
        echo "    ";
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_facets", array()) && $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "facets", array()))) {
            // line 71
            echo "      <div class=\"listing__param\">
        ";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "facets", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["facet"]) {
                // line 73
                echo "          <span class=\"listing__param-item\">
            <a href=\"";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["facet"], "link", array()), "html", null, true);
                echo "\" class=\"listing__param-delete\"></a>
            ";
                // line 75
                echo strip_tags($this->getAttribute($context["facet"], "label", array()), "<sup>");
                echo "
          </span>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['facet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "        ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "facets", array())) {
                // line 79
                echo "          <span class=\"listing__param-item\">
              <a href=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "facet_reset_url", array()), "html", null, true);
                echo "\" class=\"listing__param-delete\"></a>
              ";
                // line 81
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Clear", "realtyspace")), "html", null, true);
                echo "
          </span>
        ";
            }
            // line 84
            echo "      </div>

      <!--end of block .listing__param-->
    ";
        }
        // line 88
        echo "    <div class=\"site__main\">
      ";
        // line 89
        $context["search_result"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "results", array());
        // line 90
        echo "      ";
        if ( !twig_test_empty((isset($context["search_result"]) ? $context["search_result"] : null))) {
            // line 91
            echo "        ";
            if ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map_mode", array()) == "search_results") && ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) != "map"))) {
                // line 92
                echo "            ";
                echo $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"]->getshow_map("search_results");
                echo "
        ";
            }
            // line 94
            echo "
        ";
            // line 95
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) == "table")) {
                // line 96
                echo "          <div class=\"widget js-widget widget--main\">
            <div class=\"widget__content\">
              <div class=\"datatable datatable--properties\">
                <div class=\"datatable__wrap\">
                  <table class=\"datatable__table\">
                    <thead>
                    <tr>
                      ";
                // line 103
                echo $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"]->getproperty_table_headings($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "table_columns", array()));
                echo "
                    </tr>
                    </thead>
                    <tbody>
                    ";
                // line 107
                echo $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"]->getproperty_table_rows((isset($context["search_result"]) ? $context["search_result"] : null), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "table_columns", array()));
                echo "
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        ";
            } elseif (($this->getAttribute($this->getAttribute(            // line 114
(isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) == "map")) {
                // line 115
                echo "            ";
                echo $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"]->getshow_map("search_results");
                echo "
        ";
            } else {
                // line 117
                echo "          ";
                echo $context["__internal_10b47d999605d67c564b5548c2e255fd44056e3c0ded53247715a1f35b0bcd8c"]->getlisting((isset($context["search_result"]) ? $context["search_result"] : null), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "grid_size", array()));
                echo "
        ";
            }
            // line 119
            echo "      ";
        } else {
            // line 120
            echo "        ";
            echo twig_include($this->env, $context, "partials/no-results.twig", array("classes" => "listing__empty--properties", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("The search did not return any results", "realtyspace")), "headline" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Please try again with different criteria.", "realtyspace"))));
            // line 124
            echo "
      ";
        }
        // line 126
        echo "    </div>
  ";
        // line 127
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "params", array()), "mode", array()) != "map")) {
            // line 128
            echo "    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "pagination", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "pagination", array())), "method"), "html", null, true);
            echo "
  ";
        }
        // line 130
        echo "  </div>
  <!-- END LISTING-->
";
    }

    public function getTemplateName()
    {
        return "modules/property/archive.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 130,  330 => 128,  328 => 127,  325 => 126,  321 => 124,  318 => 120,  315 => 119,  309 => 117,  303 => 115,  301 => 114,  291 => 107,  284 => 103,  275 => 96,  273 => 95,  270 => 94,  264 => 92,  261 => 91,  258 => 90,  256 => 89,  253 => 88,  247 => 84,  241 => 81,  237 => 80,  234 => 79,  231 => 78,  222 => 75,  218 => 74,  215 => 73,  211 => 72,  208 => 71,  205 => 70,  199 => 67,  195 => 65,  189 => 64,  180 => 62,  175 => 61,  171 => 60,  168 => 59,  164 => 57,  157 => 53,  152 => 52,  149 => 51,  142 => 47,  137 => 46,  134 => 45,  127 => 41,  122 => 40,  119 => 39,  112 => 35,  107 => 34,  105 => 33,  101 => 32,  98 => 31,  96 => 30,  93 => 29,  87 => 27,  85 => 26,  82 => 25,  76 => 23,  74 => 22,  68 => 20,  65 => 19,  63 => 18,  59 => 17,  55 => 15,  52 => 14,  44 => 9,  42 => 8,  37 => 7,  34 => 6,  30 => 1,  28 => 3,  26 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base-archive.twig' %}
{% from 'macro.twig' import page_header as header %}
{% from 'modules/property/macro.twig' import listing as property_listing, property_table_rows, property_table_headings, show_map %}
{# @var page \\cf47\\theme\\realtyspace\\module\\property\\viewmodel\\ArchiveViewModel #}

{% block hero_unit %}
    {{ parent() }}
    {% if page.show_map_mode == 'hero' %}
      {{ show_map('hero') }}
    {% endif %}
{% endblock %}


{% block content %}
  <!-- BEGIN LISTING-->p
  <div class=\"site site--main\">
    {{ header(page) }}
    {% if page.show_toolbar and (page.show_view or page.show_limit or page.show_sorting) %}
      {% set helper_form = page.helper_form %}
      {{ form_start(helper_form, {'attr': {'class':'form form--filter js-listing-filter'}}) }}
      <div class=\"row\">
        {% if page.show_sorting %}
          {{ form_row(helper_form.sort, {'row_class': 'form-group--sorting'}) }}
        {% endif %}

        {% if page.show_limit %}
          {{ form_row(helper_form.limit, {'row_class': 'form-group--limit'} ) }}
        {% endif %}

        {% if page.show_view and (page.show_grid_view or page.show_list_view or page.show_table_view or page.show_map_view) %}
          <div class=\"form-group form-group--view\">
            <span class=\"control-label\">{{ __('View:', 'realtyspace')|format() }}</span>
            {% if page.show_grid_view %}
              <a href=\"{{ se_url('mode', 'grid') }}\"
                 class=\"btn--white {{ page.params.mode == 'grid' or not page.params.mode ? 'active' }}\">
                <span class=\"fa fa-th-large\"></span>
              </a>
            {% endif %}
            {% if page.show_list_view %}
              <a href=\"{{ se_url('mode', 'list') }}\"
                 class=\"btn--white {{ page.params.mode == 'list' ? 'active' }}\">
                <i class=\"fa fa-bars\"></i>
              </a>
            {% endif %}
            {% if page.show_table_view %}
              <a href=\"{{ se_url('mode', 'table') }}\"
                 class=\"btn--white {{ page.params.mode == 'table' ? 'active' }}\">
                <i class=\"fa fa-table\"></i>
              </a>
            {% endif %}
            {% if page.show_map_view %}
              <a href=\"{{ se_url('mode', 'map') }}\"
                 class=\"btn--white {{ page.params.mode == 'map' ? 'active' }}\">
                <i class=\"fa fa-map-marker\"></i>
              </a>
            {% endif %}
          </div>
        {% endif %}

        {% for collection in helper_form %}
          {% for collection_item in collection %}
            {{ form_widget(collection_item) }}
          {% endfor %}
        {% endfor %}

      </div>
      {{ form_end(helper_form) }}

    {% endif %}
    {% if page.show_facets and page.facets %}
      <div class=\"listing__param\">
        {% for facet in page.facets %}
          <span class=\"listing__param-item\">
            <a href=\"{{ facet.link }}\" class=\"listing__param-delete\"></a>
            {{ facet.label|striptags('<sup>')|raw }}
          </span>
        {% endfor %}
        {% if page.facets %}
          <span class=\"listing__param-item\">
              <a href=\"{{ page.facet_reset_url }}\" class=\"listing__param-delete\"></a>
              {{__('Clear', 'realtyspace')}}
          </span>
        {% endif %}
      </div>

      <!--end of block .listing__param-->
    {% endif %}
    <div class=\"site__main\">
      {% set search_result = page.results %}
      {% if search_result is not empty %}
        {% if page.show_map_mode == 'search_results' and page.params.mode != 'map' %}
            {{ show_map('search_results') }}
        {% endif %}

        {% if page.params.mode == 'table' %}
          <div class=\"widget js-widget widget--main\">
            <div class=\"widget__content\">
              <div class=\"datatable datatable--properties\">
                <div class=\"datatable__wrap\">
                  <table class=\"datatable__table\">
                    <thead>
                    <tr>
                      {{ property_table_headings(page.table_columns) }}
                    </tr>
                    </thead>
                    <tbody>
                    {{ property_table_rows(search_result, page.table_columns) }}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        {% elseif page.params.mode == 'map' %}
            {{ show_map('search_results') }}
        {% else %}
          {{ property_listing(search_result, page.params.mode, page.grid_size) }}
        {% endif %}
      {% else %}
        {{ include('partials/no-results.twig', {
          'classes': 'listing__empty--properties',
          'title': __('The search did not return any results', 'realtyspace'),
          'headline': __('Please try again with different criteria.', 'realtyspace')
        }) }}
      {% endif %}
    </div>
  {% if page.params.mode != 'map' %}
    {{ macro.pagination(page.pagination) }}
  {% endif %}
  </div>
  <!-- END LISTING-->
{% endblock %}", "modules/property/archive.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/archive.twig");
    }
}
