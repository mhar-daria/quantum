<?php

/* modules/propertygallery/template.twig */
class __TwigTemplate_f2bbd0fcebe997c86542e5dbce9c900b44ff12bba7485c64cb4b351beb209558 extends Twig_Template
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
        $context["__internal_c48c505429eef34d9c3034fe35deedb8671c2b62e964c0de999d87a056c14038"] = $this->loadTemplate("modules/property/macro.twig", "modules/propertygallery/template.twig", 2);
        // line 3
        $context["__internal_e96e2a4de434bc227caf762b1a65c3661a838f7f1dad1bf48b3a2faea86be8cb"] = $this->loadTemplate("macro.twig", "modules/propertygallery/template.twig", 3);
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
        echo $context["__internal_e96e2a4de434bc227caf762b1a65c3661a838f7f1dad1bf48b3a2faea86be8cb"]->getpage_header((isset($context["page"]) ? $context["page"] : null), false);
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
                // line 51
                echo "            ";
                echo $context["__internal_c48c505429eef34d9c3034fe35deedb8671c2b62e964c0de999d87a056c14038"]->getgrid_item($context["property"], array("gallery_mode" => true, "hover_params" => false, "hover_btn" => true, "index" => $this->getAttribute(                // line 55
$context["loop"], "index0", array())));
                // line 56
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
            // line 58
            echo "        ";
        }
        // line 59
        echo "      </div>
    </div>
  </div>
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
        return array (  219 => 59,  216 => 58,  201 => 56,  199 => 55,  197 => 51,  179 => 50,  176 => 49,  160 => 46,  154 => 42,  148 => 40,  145 => 39,  139 => 37,  137 => 36,  133 => 35,  130 => 34,  128 => 33,  121 => 29,  114 => 27,  108 => 26,  97 => 24,  94 => 23,  76 => 22,  74 => 21,  70 => 19,  64 => 16,  60 => 15,  56 => 14,  51 => 12,  48 => 11,  46 => 10,  42 => 9,  38 => 7,  36 => 6,  33 => 5,  29 => 1,  27 => 3,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/propertygallery/template.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/propertygallery/template.twig");
    }
}
