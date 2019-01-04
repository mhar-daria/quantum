<?php

/* modules/property/custom-properties.twig */
class __TwigTemplate_1308ad37abc5d78c7efd06e1e7e73653e0370d6ccb3917718899ef1e12589a29 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("custom-base-archive.twig", "modules/property/custom-properties.twig", 3);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "custom-base-archive.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 5
        $context["__internal_922b3e390ab9159a7cecf18b8c27b585840ad13b8c634d8bae46d0a1b74165b0"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/custom-properties.twig", 5);
        // line 7
        $context["property"] = (isset($context["page"]) ? $context["page"] : null);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <!-- BEGIN LISTING-->
  <div class=\"site site--main\">
    <header class=\"site__header\">
      <h1 class=\"site__title\">
        ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
        echo "
      </h1>
    </header>

    <form method=\"get\" action=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "url", array()), "html", null, true);
        echo "\" class=\"form form--filter js-listing-filter\">
      <div class=\"row\">
        <div class=\"form-group form-group--sorting \">
          <label class=\"control-label\" for=\"cf47rs_listing_header_sort\">Sort by</label>
          <select id=\"cf47rs_listing_header_sort\" name=\"sort\" onchange=\"this.form.submit()\" class=\"form-control select2-hidden-accessible\" tabindex=\"-1\" aria-hidden=\"true\">
            ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sort_bys", array()));
        foreach ($context['_seq'] as $context["key"] => $context["sort"]) {
            // line 24
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sort_by", array()) == $context["key"])) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["sort"], "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['sort'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "          </select>
        </div>
      
        <div class=\"form-group form-group--limit \">
          <label class=\"control-label\" for=\"cf47rs_listing_header_limit\">Show on page</label>
          <select id=\"cf47rs_listing_header_limit\" name=\"limit\" onchange=\"this.form.submit()\" class=\"form-control select2-hidden-accessible\" tabindex=\"-1\" aria-hidden=\"true\">
            ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "limits", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["limit"]) {
            // line 33
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, $context["limit"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "limit", array()) == $context["limit"])) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["limit"], "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "          </select>
        </div>

        ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "contract_type"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["contract_type"]) {
            // line 39
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $context["contract_type"], "html", null, true);
            echo "\" id=\"contract_type\" name=\"contract_type[]\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contract_type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
        ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "property_type"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["property_type"]) {
            // line 43
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $context["property_type"], "html", null, true);
            echo "\" id=\"property_type\" name=\"property_type[]\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property_type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "
        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "location"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
            // line 47
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $context["location"], "html", null, true);
            echo "\" id=\"location\" name=\"location[]\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
        ";
        // line 50
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "area_from"), "method")) {
            // line 51
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "area_from"), "method"), "html", null, true);
            echo "\" id=\"area_from\" name=\"area_from\">
        ";
        }
        // line 53
        echo "
        ";
        // line 54
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "area_to"), "method")) {
            // line 55
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "area_to"), "method"), "html", null, true);
            echo "\" id=\"area_to\" name=\"area_to\">
        ";
        }
        // line 57
        echo "
        ";
        // line 58
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "bedroom"), "method")) {
            // line 59
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "bedroom"), "method"), "html", null, true);
            echo "\" id=\"bedroom\" name=\"bedroom\">
        ";
        }
        // line 61
        echo "
        ";
        // line 62
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "price"), "method")) {
            // line 63
            echo "          <input type=\"hidden\" style=\"display: none !important;\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "query_params", array(0 => "price"), "method"), "html", null, true);
            echo "\" id=\"price\" name=\"price\">
        ";
        }
        // line 65
        echo "      </div>
    </form>

    <div class=\"site__main\">
      ";
        // line 69
        $context["search_result"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "properties", array());
        // line 70
        echo "      ";
        if ( !twig_test_empty((isset($context["search_result"]) ? $context["search_result"] : null))) {
            // line 71
            echo "
        <div class=\"listing listing listing--grid  listing--medium properties properties--grid\">
          ";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["search_result"]) ? $context["search_result"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 74
                echo "            ";
                echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "generate_boxes", array(0 => $context["result"]), "method");
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "        </div>

      ";
        } else {
            // line 79
            echo "        ";
            echo twig_include($this->env, $context, "partials/no-results.twig", array("classes" => "listing__empty--properties", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("The search did not return any results", "realtyspace")), "headline" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Please try again with different criteria.", "realtyspace"))));
            // line 83
            echo "
      ";
        }
        // line 85
        echo "    </div>

    <div class=\"site__footer\">
      <nav class=\"listing__pagination\">
        <ul class=\"pagination-custom \">
          <li ";
        // line 90
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == 1)) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "first", array()), "html", null, true);
        echo "/\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span class=\"sr-only\">First</span>
            </a>
          </li>
          <li ";
        // line 97
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == 1)) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "prev", array()), "html", null, true);
        echo "\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span class=\"sr-only\">Previous</span>
            </a>
          </li>
          <li ";
        // line 103
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "last_page", array()))) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "next", array()), "html", null, true);
        echo "\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span class=\"sr-only\">Next</span>
            </a>
          </li>
          <li ";
        // line 109
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "last_page", array()))) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "last", array()), "html", null, true);
        echo "\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span class=\"sr-only\">Last</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- END LISTING-->
";
    }

    public function getTemplateName()
    {
        return "modules/property/custom-properties.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 110,  287 => 109,  279 => 104,  273 => 103,  265 => 98,  259 => 97,  250 => 91,  244 => 90,  237 => 85,  233 => 83,  230 => 79,  225 => 76,  216 => 74,  212 => 73,  208 => 71,  205 => 70,  203 => 69,  197 => 65,  191 => 63,  189 => 62,  186 => 61,  180 => 59,  178 => 58,  175 => 57,  169 => 55,  167 => 54,  164 => 53,  158 => 51,  156 => 50,  153 => 49,  144 => 47,  140 => 46,  137 => 45,  128 => 43,  124 => 42,  121 => 41,  112 => 39,  108 => 38,  103 => 35,  88 => 33,  84 => 32,  76 => 26,  61 => 24,  57 => 23,  49 => 18,  42 => 14,  36 => 10,  33 => 9,  29 => 3,  27 => 7,  25 => 5,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var page \\cf47\\theme\\realtyspace\\module\\property\\viewmodel\\CustomPropertyModel #}

{% extends 'custom-base-archive.twig' %}

{% from 'modules/property/macro.twig' import listing as property_listing, property_table_rows, property_table_headings, show_map %}

{% set property = page %}

{% block content %}
  <!-- BEGIN LISTING-->
  <div class=\"site site--main\">
    <header class=\"site__header\">
      <h1 class=\"site__title\">
        {{ property.title }}
      </h1>
    </header>

    <form method=\"get\" action=\"{{ property.url }}\" class=\"form form--filter js-listing-filter\">
      <div class=\"row\">
        <div class=\"form-group form-group--sorting \">
          <label class=\"control-label\" for=\"cf47rs_listing_header_sort\">Sort by</label>
          <select id=\"cf47rs_listing_header_sort\" name=\"sort\" onchange=\"this.form.submit()\" class=\"form-control select2-hidden-accessible\" tabindex=\"-1\" aria-hidden=\"true\">
            {% for key, sort in property.sort_bys %}
              <option value=\"{{ key }}\" {% if property.sort_by == key %}selected{% endif %}>{{ sort }}</option>
            {% endfor %}
          </select>
        </div>
      
        <div class=\"form-group form-group--limit \">
          <label class=\"control-label\" for=\"cf47rs_listing_header_limit\">Show on page</label>
          <select id=\"cf47rs_listing_header_limit\" name=\"limit\" onchange=\"this.form.submit()\" class=\"form-control select2-hidden-accessible\" tabindex=\"-1\" aria-hidden=\"true\">
            {% for limit in property.limits %}
              <option value=\"{{ limit }}\" {% if property.limit == limit %}selected{% endif %}>{{ limit }}</option>
            {% endfor %}
          </select>
        </div>

        {% for contract_type in property.query_params('contract_type') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ contract_type }}\" id=\"contract_type\" name=\"contract_type[]\">
        {% endfor %}

        {% for property_type in property.query_params('property_type') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ property_type }}\" id=\"property_type\" name=\"property_type[]\">
        {% endfor %}

        {% for location in property.query_params('location') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ location }}\" id=\"location\" name=\"location[]\">
        {% endfor %}

        {% if property.query_params('area_from') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ property.query_params('area_from') }}\" id=\"area_from\" name=\"area_from\">
        {% endif %}

        {% if property.query_params('area_to') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ property.query_params('area_to') }}\" id=\"area_to\" name=\"area_to\">
        {% endif %}

        {% if property.query_params('bedroom') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ property.query_params('bedroom') }}\" id=\"bedroom\" name=\"bedroom\">
        {% endif %}

        {% if property.query_params('price') %}
          <input type=\"hidden\" style=\"display: none !important;\" value=\"{{ property.query_params('price') }}\" id=\"price\" name=\"price\">
        {% endif %}
      </div>
    </form>

    <div class=\"site__main\">
      {% set search_result = page.properties %}
      {% if search_result is not empty %}

        <div class=\"listing listing listing--grid  listing--medium properties properties--grid\">
          {% for result in search_result %}
            {{ property.generate_boxes(result)|raw }}
          {% endfor %}
        </div>

      {% else %}
        {{ include('partials/no-results.twig', {
          'classes': 'listing__empty--properties',
          'title': __('The search did not return any results', 'realtyspace'),
          'headline': __('Please try again with different criteria.', 'realtyspace')
        }) }}
      {% endif %}
    </div>

    <div class=\"site__footer\">
      <nav class=\"listing__pagination\">
        <ul class=\"pagination-custom \">
          <li {% if property.current_page == 1 %}class=\"active\"{% endif %}>
            <a href=\"{{ property.first }}/\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span class=\"sr-only\">First</span>
            </a>
          </li>
          <li {% if property.current_page == 1 %}class=\"active\"{% endif %}>
            <a href=\"{{ property.prev }}\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span class=\"sr-only\">Previous</span>
            </a>
          </li>
          <li {% if property.current_page == property.last_page %}class=\"active\"{% endif %}>
            <a href=\"{{ property.next }}\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span class=\"sr-only\">Next</span>
            </a>
          </li>
          <li {% if property.current_page == property.last_page %}class=\"active\"{% endif %}>
            <a href=\"{{ property.last }}\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span class=\"sr-only\">Last</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- END LISTING-->
{% endblock %}", "modules/property/custom-properties.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/custom-properties.twig");
    }
}
