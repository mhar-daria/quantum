<?php

/* modules/agent/sections/agent-grid.twig */
class __TwigTemplate_46b9d832065e020bf7f2b2c057c74c105989550b024b4e8495bf9e40417ca34f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/agent/sections/agent-grid.twig", 9);
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
        $context["__internal_e92b2ca321c4ef8d774b48db464159bc3925fe76e8ffb277c0475cf34df45737"] = $this->loadTemplate("macro.twig", "modules/agent/sections/agent-grid.twig", 1);
        // line 2
        $context["__internal_445ec2f190b1f53da1f6c711118f59243071938ed8aa898cb38966a4c41f72a5"] = $this->loadTemplate("modules/agent/macro.twig", "modules/agent/sections/agent-grid.twig", 2);
        // line 5
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("workerIndex", array("animate" => true)));
        // line 11
        $context["widget_class"] = "landing gray worker-section";
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "  ";
        echo $context["__internal_e92b2ca321c4ef8d774b48db464159bc3925fe76e8ffb277c0475cf34df45737"]->getwidget_header($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "subtitle", array()), "worker");
        echo "
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "  <div class=\"listing listing--grid listing--small worker worker--index\">
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "agents", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["agent"]) {
            // line 20
            echo "      <div class=\"listing__item\">
        <div class=\"worker__item vcard animate-end\">
          <div class=\"worker__photo\">
            <a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "link", array()), "html", null, true);
            echo "\" class=\"item-photo item-photo--static\">
              ";
            // line 24
            echo $context["__internal_e92b2ca321c4ef8d774b48db464159bc3925fe76e8ffb277c0475cf34df45737"]->getthumbnail($this->getAttribute($context["agent"], "featured_image", array()), 500, 480, "photo", false, $this->getAttribute($this->getAttribute($context["agent"], "featured_image", array()), "alt", array()));
            echo "
            </a>
            <div class=\"worker__details\">
              ";
            // line 27
            if ($this->getAttribute($context["agent"], "job_title", array())) {
                // line 28
                echo "                <span class=\"worker__post\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "job_title", array()), "html", null, true);
                echo "</span>
              ";
            }
            // line 30
            echo "              <div class=\"worker__links\">
                ";
            // line 31
            if ($this->getAttribute($context["agent"], "email", array())) {
                // line 32
                echo "                  <a class=\"worker__link\" href=\"mailto:";
                echo antispambot($this->getAttribute($context["agent"], "email", array()));
                echo "\" title=\"";
                echo antispambot($this->getAttribute($context["agent"], "email", array()));
                echo "\">
                    <svg class=\"worker__link-icon\">
                      <use xlink:href=\"#icon-mail\"></use>
                    </svg>
                  </a>
                ";
            }
            // line 38
            echo "
                ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["agent"], "social_profiles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["social_profile"]) {
                // line 40
                echo "                  ";
                echo $context["__internal_445ec2f190b1f53da1f6c711118f59243071938ed8aa898cb38966a4c41f72a5"]->getsocial_item($context["social_profile"], "worker__link");
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['social_profile'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "              </div>
            </div>
          </div>
          <div class=\"worker__info\">
            <h4 class=\"worker__name fn\">";
            // line 46
            echo $this->getAttribute($context["agent"], "name", array());
            echo "</h4>
            ";
            // line 47
            $context["contact_number"] = $this->getAttribute($context["agent"], "main_contact_number", array());
            // line 48
            echo "            ";
            if ((isset($context["contact_number"]) ? $context["contact_number"] : null)) {
                // line 49
                echo "              <a href=\"tel:";
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute((isset($context["contact_number"]) ? $context["contact_number"] : null), "number", array()), array(" " => "")), "html", null, true);
                echo "\" class=\"worker__tel uri\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contact_number"]) ? $context["contact_number"] : null), "number", array()), "html", null, true);
                echo "</a>
            ";
            }
            // line 51
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "link", array()), "html", null, true);
            echo "\" class=\"worker__more\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Read more", "realtyspace")), "html", null, true);
            echo "</a>
            <!-- end of block .worker__contacts-->
          </div>
          <!-- end of block .worker__info-->
        </div>
      </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 58
            echo "      ";
            echo $context["__internal_e92b2ca321c4ef8d774b48db464159bc3925fe76e8ffb277c0475cf34df45737"]->getno_items_available();
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/agent/sections/agent-grid.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 60,  153 => 58,  138 => 51,  130 => 49,  127 => 48,  125 => 47,  121 => 46,  115 => 42,  106 => 40,  102 => 39,  99 => 38,  87 => 32,  85 => 31,  82 => 30,  76 => 28,  74 => 27,  68 => 24,  64 => 23,  59 => 20,  54 => 19,  51 => 18,  48 => 17,  41 => 14,  38 => 13,  34 => 9,  32 => 11,  30 => 5,  28 => 2,  26 => 1,  11 => 9,);
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
{% from 'modules/agent/macro.twig' import social_item %}
{# @var section \\cf47\\theme\\realtyspace\\module\\home\\view\\template\\AgentGrid #}

{% set module_id = js_module('workerIndex', {
'animate': true,
}) %}

{% extends 'section-widget.twig' %}

{% set widget_class='landing gray worker-section' %}

{% block header %}
  {{ widget_header(section.title, section.subtitle, 'worker') }}
{% endblock %}

{% block content %}
  <div class=\"listing listing--grid listing--small worker worker--index\">
    {% for agent in section.agents %}
      <div class=\"listing__item\">
        <div class=\"worker__item vcard animate-end\">
          <div class=\"worker__photo\">
            <a href=\"{{ agent.link }}\" class=\"item-photo item-photo--static\">
              {{ thumbnail(agent.featured_image, 500, 480, 'photo', false, agent.featured_image.alt) }}
            </a>
            <div class=\"worker__details\">
              {% if agent.job_title %}
                <span class=\"worker__post\">{{ agent.job_title }}</span>
              {% endif %}
              <div class=\"worker__links\">
                {% if agent.email %}
                  <a class=\"worker__link\" href=\"mailto:{{ agent.email|antispambot }}\" title=\"{{ agent.email|antispambot }}\">
                    <svg class=\"worker__link-icon\">
                      <use xlink:href=\"#icon-mail\"></use>
                    </svg>
                  </a>
                {% endif %}

                {% for social_profile in agent.social_profiles %}
                  {{ social_item(social_profile, 'worker__link') }}
                {% endfor %}
              </div>
            </div>
          </div>
          <div class=\"worker__info\">
            <h4 class=\"worker__name fn\">{{ agent.name|raw }}</h4>
            {% set contact_number = agent.main_contact_number %}
            {% if contact_number %}
              <a href=\"tel:{{ contact_number.number|replace({' ': ''}) }}\" class=\"worker__tel uri\">{{ contact_number.number }}</a>
            {% endif %}
            <a href=\"{{ agent.link }}\" class=\"worker__more\">{{ __('Read more', 'realtyspace') }}</a>
            <!-- end of block .worker__contacts-->
          </div>
          <!-- end of block .worker__info-->
        </div>
      </div>
    {% else %}
      {{ no_items_available() }}
    {% endfor %}

  </div>
{% endblock %}
", "modules/agent/sections/agent-grid.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/sections/agent-grid.twig");
    }
}