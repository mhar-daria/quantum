<?php

/* modules/post/section.twig */
class __TwigTemplate_17be0337bb8aa1193e268197c57c4fa5d58980fb58b9c0cb5723b2f0295462a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 8
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/post/section.twig", 8);
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
        $context["__internal_fdbef92818bb89662071114b4a6a17f660282be7b160a3db79848253e2993f72"] = $this->loadTemplate("macro.twig", "modules/post/section.twig", 1);
        // line 4
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("articleGrid", array("animate" => true)));
        // line 10
        $context["widget_class"] = "landing article-section";
        // line 8
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        // line 13
        echo "  ";
        echo $context["__internal_fdbef92818bb89662071114b4a6a17f660282be7b160a3db79848253e2993f72"]->getwidget_header($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "title", array()), $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "subtitle", array()));
        echo "
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "  <div class=\"listing listing--grid article article--grid\">
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "items", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 19
            echo "      <div class=\"listing__item\">
        <div class=\"article__item\">
          <a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "link", array()), "html", null, true);
            echo "\" class=\"article__photo\">
            ";
            // line 22
            echo $context["__internal_fdbef92818bb89662071114b4a6a17f660282be7b160a3db79848253e2993f72"]->getthumbnail($this->getAttribute($context["post"], "featured_image", array()), 830, 540, "article__photo-img");
            echo "
            <time datetime=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date", array(0 => "Y-m-d"), "method"), "html", null, true);
            echo "\" class=\"article__time\">
              ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date", array(0 => "M"), "method"), "html", null, true);
            echo "<strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date", array(0 => "d"), "method"), "html", null, true);
            echo "</strong>
            </time>
          </a>
          <div class=\"article__details\">
            <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "link", array()), "html", null, true);
            echo "\" class=\"article__item-title\">";
            echo $this->getAttribute($context["post"], "title", array());
            echo "</a>
            <div class=\"article__intro\"> ";
            // line 29
            echo $this->getAttribute($context["post"], "preview", array(0 => 25, 1 => true, 2 => false), "method");
            echo "</div>
            <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "link", array()), "html", null, true);
            echo "\" class=\"article__more\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Read more", "realtyspace")), "html", null, true);
            echo "</a>
          </div>
        </div>
        <!-- end of block .article__item-->
      </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 36
            echo "      ";
            echo $context["__internal_fdbef92818bb89662071114b4a6a17f660282be7b160a3db79848253e2993f72"]->getno_items_available();
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "  </div>
  <!-- end of block .article__list-->
  <div class=\"widget__footer\">
    <a href=\"";
        // line 41
        echo call_user_func_array($this->env->getFunction('archive_path')->getCallable(), array("post"));
        echo "\" class=\"widget__more\">
      ";
        // line 42
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("See more", "realtyspace")), "html", null, true);
        echo "
    </a>
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/post/section.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 42,  119 => 41,  114 => 38,  105 => 36,  92 => 30,  88 => 29,  82 => 28,  73 => 24,  69 => 23,  65 => 22,  61 => 21,  57 => 19,  52 => 18,  49 => 17,  46 => 16,  39 => 13,  36 => 12,  32 => 8,  30 => 10,  28 => 4,  26 => 1,  11 => 8,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/post/section.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/post/section.twig");
    }
}
