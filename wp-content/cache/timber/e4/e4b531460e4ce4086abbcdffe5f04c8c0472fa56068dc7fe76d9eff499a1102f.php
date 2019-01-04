<?php

/* modules/property/sections/slider.twig */
class __TwigTemplate_6901c5847c58b7718422bf8e3576a4dec398a4f1b4cf0b2b182ec49ebc7529c3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/property/sections/slider.twig", 5);
        $this->blocks = array(
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
        $context["__internal_c5613cd2ee3d2fc0cc1407bc3a2f5830717f8fabd16d70e3ec228e8ba24bc535"] = $this->loadTemplate("macro.twig", "modules/property/sections/slider.twig", 1);
        // line 2
        $context["__internal_45cb100376a2e3d9100420c4492e6980a42c43a552b2fc09fdc39abbcd6be9d8"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/sections/slider.twig", 2);
        // line 5
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "  <!-- BEGIN SLIDER-->
  <div id=\"";
        // line 9
        echo call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("propslider", array("parallax" => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "parallax", array()), "speed" => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "speed", array()), "autoplay" => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "autoplay", array()), "autoplaySpeed" => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "autoplaySpeed", array()))));
        echo "\" class=\"slider slider--wide slider--slideInUp\">
    <div class=\"slider__block js-slick-slider\">
      ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "properties", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 12
            echo "        <div class=\"slider__item\">
          <div class=\"slider__preview\">
            <div class=\"slider__img slider__img--lg\">
              <img data-lazy=\"";
            // line 15
            echo $context["__internal_c5613cd2ee3d2fc0cc1407bc3a2f5830717f8fabd16d70e3ec228e8ba24bc535"]->getthumbnail_src($this->getAttribute($this->getAttribute($context["property"], "thumbnail", array()), "src", array()), 2336, 1100);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
            echo "/public/img/lazy-image.jpg\" alt=\"\">
            </div>
            <div class=\"slider__img slider__img--sm\">
              <img data-lazy=\"";
            // line 18
            echo $context["__internal_c5613cd2ee3d2fc0cc1407bc3a2f5830717f8fabd16d70e3ec228e8ba24bc535"]->getthumbnail_src($this->getAttribute($this->getAttribute($context["property"], "thumbnail", array()), "src", array()), 830, 540);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
            echo "/public/img/lazy-image.jpg\" alt=\"\">
            </div>
          </div>
          <div class=\"slider__caption\">
            <div class=\"slider__price\">
              ";
            // line 23
            echo $context["__internal_45cb100376a2e3d9100420c4492e6980a42c43a552b2fc09fdc39abbcd6be9d8"]->getprice($context["property"], true, false);
            echo "
            </div>
            <!-- end of block .slider__price-->
            <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "link", array()), "html", null, true);
            echo "\" class=\"slider__address\">
              ";
            // line 27
            echo $this->getAttribute($context["property"], "title", array());
            echo "
              <span class=\"slider__address-city\">
                                ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["property"], "get_location", array(), "method"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["location_part"]) {
                // line 30
                echo "                                  ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["location_part"], "name", array()), "html", null, true);
                echo (( !$this->getAttribute($context["loop"], "last", array())) ? (",") : (""));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location_part'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "                            </span>
            </a>
            <!-- end of block .slider__address-->
            <div class=\"slider__params\">
              ";
            // line 36
            echo $context["__internal_45cb100376a2e3d9100420c4492e6980a42c43a552b2fc09fdc39abbcd6be9d8"]->getshort_params($context["property"], null, true);
            echo "
            </div>
            <!-- end of block .slider__params-->
            <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "link", array()), "html", null, true);
            echo "\" class=\"slider__more\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Details", "realtyspace")), "html", null, true);
            echo "</a>
          </div>
          <!-- end of block .slider__caption-->
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "    </div>
    <!-- end of block .slider__block-->
    <div class=\"slider__controls\">
      <button class=\"slider__control slider__control--prev js-banner-prev\"></button>
      <button class=\"slider__control slider__control--next js-banner-next\"></button>
    </div>
  </div>
  <!-- END SLIDER-->
";
    }

    public function getTemplateName()
    {
        return "modules/property/sections/slider.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 44,  133 => 39,  127 => 36,  121 => 32,  103 => 30,  86 => 29,  81 => 27,  77 => 26,  71 => 23,  61 => 18,  53 => 15,  48 => 12,  44 => 11,  39 => 9,  36 => 8,  33 => 7,  29 => 5,  27 => 2,  25 => 1,  11 => 5,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/sections/slider.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/property/sections/slider.twig");
    }
}
