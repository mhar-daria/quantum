<?php

/* modules/propertygallery/template.twig */
class __TwigTemplate_899cf1ca871e45f4fc7e138f59e07ed7aa6837e4685c03fcf65af71ba339e006 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base-archive.twig", "modules/propertygallery/template.twig", 1);
        $this->blocks = array(
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
        $context["__internal_aeae8ee3ac92f94c44a9d73a12d6f593009ce5ce16fcc47c6498d232eee730cc"] = $this->loadTemplate("modules/property/macro.twig", "modules/propertygallery/template.twig", 2);
        // line 3
        $context["__internal_d7e5a0ba3969f79fb19bfe322b715f8cda802bdfe6e2e02e9bcc696bd97caf23"] = $this->loadTemplate("macro.twig", "modules/propertygallery/template.twig", 3);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        // line 7
        echo "  <!-- BEGIN LISTING-->
  <div class=\"site site--main\">
    ";
        // line 9
        echo $context["__internal_d7e5a0ba3969f79fb19bfe322b715f8cda802bdfe6e2e02e9bcc696bd97caf23"]->getpage_header((isset($context["page"]) ? $context["page"] : null), false);
        echo "
    ";
        // line 10
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "type", array()) != "uploaded_images")) {
            // line 11
            echo "      <div class=\"site__panel\"></div>
      ";
            // line 12
            echo             $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["helper_form"]) ? $context["helper_form"] : null), 'form_start', array("attr" => array("class" => "form form--filter js-listing-filter")));
            echo "
      <div class=\"row\">
        ";
            // line 14
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["helper_form"]) ? $context["helper_form"] : null), "sort", array()), 'row', array("row_class" => "form-group--sorting"));
            echo "
        ";
            // line 15
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["helper_form"]) ? $context["helper_form"] : null), "limit", array()), 'row', array("row_class" => "form-group--limit"));
            echo "
        ";
            // line 16
            echo             $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["helper_form"]) ? $context["helper_form"] : null), 'form_end');
            echo "
      </div>
    ";
        }
        // line 19
        echo "    <div class=\"site__main\">
      <div class=\"listing listing--grid listing listing--grid listing--lg-4 js-dapi-gallery\">
        ";
        // line 21
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "type", array()) == "uploaded_images")) {
            // line 22
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "images", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 23
                echo "            <div class=\"listing__item\">
              <div class=\"properties__item\" data-item data-size=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "width", array()), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "height", array()), "html", null, true);
                echo "\" data-src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "src", array()), "html", null, true);
                echo "\" data-caption=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "caption", array()), "html", null, true);
                echo "\">
                <div class=\"properties__thumb\">
                  <a href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "src", array()), "html", null, true);
                echo "\" data-trigger data-index=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"item-photo item-photo--static\">
                    <img data-thumbnail src=\"";
                // line 27
                echo twig_escape_filter($this->env, Timber\ImageHelper::resize($this->getAttribute($context["image"], "src", array()), 830, 540), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "alt", array()), "html", null, true);
                echo "\">
                    <figure class=\"item-photo__hover\">
                      <span class=\"item-photo__more\">";
                // line 29
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("View", "realtyspace")), "html", null, true);
                echo "</span>
                    </figure>
                  </a>
                </div>
                ";
                // line 33
                if (( !twig_test_empty($this->getAttribute($context["image"], "caption", array())) ||  !twig_test_empty($this->getAttribute($context["image"], "description", array())))) {
                    // line 34
                    echo "                  <div class=\"properties__info\">
                    <a href=\"";
                    // line 35
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "src", array()), "html", null, true);
                    echo "\" class=\"properties__address\" data-trigger>
                      ";
                    // line 36
                    if ( !twig_test_empty($this->getAttribute($context["image"], "caption", array()))) {
                        // line 37
                        echo "                        <span data-caption class=\"properties__address-street\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "caption", array()), "html", null, true);
                        echo "</span>
                      ";
                    }
                    // line 39
                    echo "                      ";
                    if ( !twig_test_empty($this->getAttribute($context["image"], "description", array()))) {
                        // line 40
                        echo "                        <span class=\"properties__address-city\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "description", array()), "html", null, true);
                        echo "</span>
                      ";
                    }
                    // line 42
                    echo "                    </a>
                  </div>
                  <!-- end of block .properties__info-->
                ";
                }
                // line 46
                echo "              </div>
            </div>
          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "        ";
        } else {
            // line 50
            echo "          ";
            if ((isset($context["custom_page"]) ? $context["custom_page"] : null)) {
                // line 51
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "properties", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                    // line 52
                    echo "              ";
                    echo $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "generate_boxes", array(0 => $context["property"]), "method");
                    echo "
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 54
                echo "          ";
            } else {
                // line 55
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : null));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                    // line 56
                    echo "              ";
                    echo $context["__internal_aeae8ee3ac92f94c44a9d73a12d6f593009ce5ce16fcc47c6498d232eee730cc"]->getgrid_item($context["property"], array("gallery_mode" => true, "hover_params" => false, "hover_btn" => true, "index" => $this->getAttribute(                    // line 60
$context["loop"], "index0", array())));
                    // line 61
                    echo "
            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "          ";
            }
            // line 64
            echo "        ";
        }
        // line 65
        echo "      </div>
    </div>
    ";
        // line 67
        if ((isset($context["custom_page"]) ? $context["custom_page"] : null)) {
            // line 68
            echo "      <div class=\"site__footer\">
        <nav class=\"listing__pagination\">
          <ul class=\"pagination-custom \">
            <li ";
            // line 71
            if (($this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "current_page", array()) == 1)) {
                echo "class=\"active\"";
            }
            echo ">
              <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "first", array()), "html", null, true);
            echo "/\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                <span class=\"sr-only\">First</span>
              </a>
            </li>
            <li ";
            // line 78
            if (($this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "current_page", array()) == 1)) {
                echo "class=\"active\"";
            }
            echo ">
              <a href=\"";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "prev", array()), "html", null, true);
            echo "\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                <span class=\"sr-only\">Previous</span>
              </a>
            </li>
            <li ";
            // line 84
            if (($this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "current_page", array()) == $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "last_page", array()))) {
                echo "class=\"active\"";
            }
            echo ">
              <a href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "next", array()), "html", null, true);
            echo "\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                <span class=\"sr-only\">Next</span>
              </a>
            </li>
            <li ";
            // line 90
            if (($this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "current_page", array()) == $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "last_page", array()))) {
                echo "class=\"active\"";
            }
            echo ">
              <a href=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["custom_properties"]) ? $context["custom_properties"] : null), "last", array()), "html", null, true);
            echo "\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                <span class=\"sr-only\">Last</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    ";
        }
        // line 101
        echo "  </div>
  <!-- END LISTING-->
";
    }

    public function getTemplateName()
    {
        return "modules/propertygallery/template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 101,  302 => 91,  296 => 90,  288 => 85,  282 => 84,  274 => 79,  268 => 78,  259 => 72,  253 => 71,  248 => 68,  246 => 67,  242 => 65,  239 => 64,  236 => 63,  221 => 61,  219 => 60,  217 => 56,  199 => 55,  196 => 54,  187 => 52,  182 => 51,  179 => 50,  176 => 49,  160 => 46,  154 => 42,  148 => 40,  145 => 39,  139 => 37,  137 => 36,  133 => 35,  130 => 34,  128 => 33,  121 => 29,  114 => 27,  108 => 26,  97 => 24,  94 => 23,  76 => 22,  74 => 21,  70 => 19,  64 => 16,  60 => 15,  56 => 14,  51 => 12,  48 => 11,  46 => 10,  42 => 9,  38 => 7,  36 => 6,  33 => 5,  29 => 1,  27 => 3,  25 => 2,  11 => 1,);
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
{% from 'modules/property/macro.twig' import grid_item %}
{% from 'macro.twig' import page_header %}

{% block content %}
  {# @var page \\cf47\\theme\\realtyspace\\module\\propertygallery\\viewmodel\\Template #}
  <!-- BEGIN LISTING-->
  <div class=\"site site--main\">
    {{ page_header(page, false) }}
    {% if page.type != 'uploaded_images' %}
      <div class=\"site__panel\"></div>
      {{ form_start(helper_form, {'attr': {'class':'form form--filter js-listing-filter'}}) }}
      <div class=\"row\">
        {{ form_row(helper_form.sort, {'row_class': 'form-group--sorting'}) }}
        {{ form_row(helper_form.limit, {'row_class': 'form-group--limit'} ) }}
        {{ form_end(helper_form) }}
      </div>
    {% endif %}
    <div class=\"site__main\">
      <div class=\"listing listing--grid listing listing--grid listing--lg-4 js-dapi-gallery\">
        {% if page.type == 'uploaded_images' %}
          {% for image in page.images %}
            <div class=\"listing__item\">
              <div class=\"properties__item\" data-item data-size=\"{{ image.width }}x{{ image.height }}\" data-src=\"{{ image.src }}\" data-caption=\"{{ image.caption }}\">
                <div class=\"properties__thumb\">
                  <a href=\"{{ image.src }}\" data-trigger data-index=\"{{ loop.index0 }}\" class=\"item-photo item-photo--static\">
                    <img data-thumbnail src=\"{{ image.src|resize(830,540) }}\" alt=\"{{ image.alt }}\">
                    <figure class=\"item-photo__hover\">
                      <span class=\"item-photo__more\">{{ __('View', 'realtyspace') }}</span>
                    </figure>
                  </a>
                </div>
                {% if image.caption is not empty or image.description is not empty %}
                  <div class=\"properties__info\">
                    <a href=\"{{ image.src }}\" class=\"properties__address\" data-trigger>
                      {% if image.caption is not empty %}
                        <span data-caption class=\"properties__address-street\">{{ image.caption }}</span>
                      {% endif %}
                      {% if image.description is not empty %}
                        <span class=\"properties__address-city\">{{ image.description }}</span>
                      {% endif %}
                    </a>
                  </div>
                  <!-- end of block .properties__info-->
                {% endif %}
              </div>
            </div>
          {% endfor %}
        {% else %}
          {% if custom_page %}
            {% for property in custom_properties.properties %}
              {{ custom_properties.generate_boxes( property )|raw }}
            {% endfor %}
          {% else %}
            {% for property in results %}
              {{ grid_item(property, {
                'gallery_mode': true,
                'hover_params': false,
                'hover_btn': true,
                'index': loop.index0
              }) }}
            {% endfor %}
          {% endif %}
        {% endif %}
      </div>
    </div>
    {% if custom_page %}
      <div class=\"site__footer\">
        <nav class=\"listing__pagination\">
          <ul class=\"pagination-custom \">
            <li {% if custom_properties.current_page == 1 %}class=\"active\"{% endif %}>
              <a href=\"{{ custom_properties.first }}/\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                <span class=\"sr-only\">First</span>
              </a>
            </li>
            <li {% if custom_properties.current_page == 1 %}class=\"active\"{% endif %}>
              <a href=\"{{ custom_properties.prev }}\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                <span class=\"sr-only\">Previous</span>
              </a>
            </li>
            <li {% if custom_properties.current_page == custom_properties.last_page %}class=\"active\"{% endif %}>
              <a href=\"{{ custom_properties.next }}\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                <span class=\"sr-only\">Next</span>
              </a>
            </li>
            <li {% if custom_properties.current_page == custom_properties.last_page %}class=\"active\"{% endif %}>
              <a href=\"{{ custom_properties.last }}\">
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                <span class=\"sr-only\">Last</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    {% endif %}
  </div>
  <!-- END LISTING-->
{% endblock %}", "modules/propertygallery/template.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/propertygallery/template.twig");
    }
}
