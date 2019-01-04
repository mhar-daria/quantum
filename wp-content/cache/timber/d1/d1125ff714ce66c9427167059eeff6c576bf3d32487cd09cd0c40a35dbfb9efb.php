<?php

/* modules/page/single.twig */
class __TwigTemplate_d44024bc6fc2be3956246d26e450d9f115a0cfc9a091edd1fdc0f1f45ad62639 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base-archive.twig", "modules/page/single.twig", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div class=\"site site--main\">
    <p>hello</p>
    ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "page_header", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method"), "html", null, true);
        echo "
    <div class=\"site__main\">
      <div class=\"widget \">
        <div class=\"widget__content\">
          <article class=\"article article--details article--page\">
            <div class=\"article__body\">
              ";
        // line 12
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "excerpt", array())) {
            // line 13
            echo "                <p>
                  <strong>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "excerpt", array()), "html", null, true);
            echo "</strong>
                </p>
              ";
        }
        // line 17
        echo "              ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured_image", array())) {
            // line 18
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured_image", array()), 1 => 1170), "method"), "html", null, true);
            echo "
              ";
        }
        // line 20
        echo "              ";
        echo call_user_func_array($this->env->getFunction('content')->getCallable(), array(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Read more", "realtyspace"))));
        echo "
            </div>
            ";
        // line 22
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "social_links", array()))) {
            // line 23
            echo "              <div class=\"article__footer\">
                <div class=\"social social--article\">
                  <span>";
            // line 25
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Share this post", "realtyspace")), "html", null, true);
            echo "</span>
                  ";
            // line 26
            $context["__internal_caa0d110f206837f5a2783aa947149b00615b56682da87f3a3e472e51cc3b275"] = $this->loadTemplate("macro.twig", "modules/page/single.twig", 26);
            // line 27
            echo "                  ";
            echo $context["__internal_caa0d110f206837f5a2783aa947149b00615b56682da87f3a3e472e51cc3b275"]->getsharing_links($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "social_links", array()));
            echo "
                </div>
              </div>
            ";
        }
        // line 31
        echo "
          </article>
          ";
        // line 33
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "comments", array());
        echo "
        </div>
      </div>
    </div>
    <!-- END LISTING-->
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/page/single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 33,  90 => 31,  82 => 27,  80 => 26,  76 => 25,  72 => 23,  70 => 22,  64 => 20,  58 => 18,  55 => 17,  49 => 14,  46 => 13,  44 => 12,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
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
{# @var page \\cf47\\theme\\realtyspace\\module\\page\\action\\SingleViewModel #}
{% block content %}
  <div class=\"site site--main\">
    <p>hello</p>
    {{ macro.page_header(page) }}
    <div class=\"site__main\">
      <div class=\"widget \">
        <div class=\"widget__content\">
          <article class=\"article article--details article--page\">
            <div class=\"article__body\">
              {% if page.excerpt %}
                <p>
                  <strong>{{ page.excerpt }}</strong>
                </p>
              {% endif %}
              {% if page.featured_image %}
                {{ macro.thumbnail(page.featured_image, 1170) }}
              {% endif %}
              {{ content(__('Read more', 'realtyspace')) }}
            </div>
            {% if page.social_links|length %}
              <div class=\"article__footer\">
                <div class=\"social social--article\">
                  <span>{{ __('Share this post', 'realtyspace') }}</span>
                  {% from 'macro.twig' import sharing_links %}
                  {{ sharing_links(page.social_links) }}
                </div>
              </div>
            {% endif %}

          </article>
          {{ page.comments|raw }}
        </div>
      </div>
    </div>
    <!-- END LISTING-->
  </div>
{% endblock %}
", "modules/page/single.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/page/single.twig");
    }
}
