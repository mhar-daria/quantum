<?php

/* modules/property/custom-properties.twig */
class __TwigTemplate_95f957d35708564e7f9a6689d1aeb4e9c821b90478ccdcafe72e218f79ee7d26 extends Twig_Template
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
        $context["__internal_6e130fe84f302ed01b9b46654f24f0cae9490d3d22e2298ca0973c65fc9fe0e9"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/custom-properties.twig", 5);
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
      </div>
    </form>

    <div class=\"site__main\">
      ";
        // line 41
        $context["search_result"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "properties", array());
        // line 42
        echo "      ";
        if ( !twig_test_empty((isset($context["search_result"]) ? $context["search_result"] : null))) {
            // line 43
            echo "
        <div class=\"listing listing listing--grid  listing--medium properties properties--grid\">
          ";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["search_result"]) ? $context["search_result"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 46
                echo "            ";
                echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "generate_boxes", array(0 => $context["result"]), "method");
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "        </div>

      ";
        } else {
            // line 51
            echo "        ";
            echo twig_include($this->env, $context, "partials/no-results.twig", array("classes" => "listing__empty--properties", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("The search did not return any results", "realtyspace")), "headline" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Please try again with different criteria.", "realtyspace"))));
            // line 55
            echo "
      ";
        }
        // line 57
        echo "    </div>

    <div class=\"site__footer\">
      <nav class=\"listing__pagination\">
        <ul class=\"pagination-custom \">
          <li ";
        // line 62
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == 1)) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "first", array()), "html", null, true);
        echo "/\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span class=\"sr-only\">First</span>
            </a>
          </li>
          <li ";
        // line 69
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == 1)) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "prev", array()), "html", null, true);
        echo "\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
              <span class=\"sr-only\">Previous</span>
            </a>
          </li>
          <li ";
        // line 75
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "last_page", array()))) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "next", array()), "html", null, true);
        echo "\">
              <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
              <span class=\"sr-only\">Next</span>
            </a>
          </li>
          <li ";
        // line 81
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "current_page", array()) == $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "last_page", array()))) {
            echo "class=\"active\"";
        }
        echo ">
            <a href=\"";
        // line 82
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
        return array (  201 => 82,  195 => 81,  187 => 76,  181 => 75,  173 => 70,  167 => 69,  158 => 63,  152 => 62,  145 => 57,  141 => 55,  138 => 51,  133 => 48,  124 => 46,  120 => 45,  116 => 43,  113 => 42,  111 => 41,  103 => 35,  88 => 33,  84 => 32,  76 => 26,  61 => 24,  57 => 23,  49 => 18,  42 => 14,  36 => 10,  33 => 9,  29 => 3,  27 => 7,  25 => 5,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/custom-properties.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/custom-properties.twig");
    }
}
