<?php

/* modules/property/single.twig */
class __TwigTemplate_314638bffa95800c411c1b5b2f1e5ddbf21876389073d44f8b7c3e60b6ae794c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("base-archive.twig", "modules/property/single.twig", 5);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'subcontent' => array($this, 'block_subcontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base-archive.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 6
        $context["__internal_b76bd0b53c289598469e33fd3ad409a1e0708b8645cd7da67c182d7140b2e043"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/single.twig", 6);
        // line 7
        $context["__internal_e19388ef34e74065b9d9127e3f46f835d8482c1763cfe6c878f27bf94487105f"] = $this->loadTemplate("macro.twig", "modules/property/single.twig", 7);
        // line 9
        $context["property"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "property", array());
        // line 5
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  <div class=\"site site--main\">
    <!-- BEGIN PROPERTY DETAILS-->
    <div class=\"property\">
      <h1 class=\"property__title\">
        ";
        // line 15
        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array());
        echo "
        <span class=\"property__city\">
                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "location", array(), "method"));
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
            // line 18
            echo "                  ";
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
        // line 20
        echo "                </span>
      </h1>
      <div class=\"property__header\">
        ";
        // line 23
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_price_box", array())) {
            // line 24
            echo "          <div class=\"property__price\">
            ";
            // line 25
            echo $context["__internal_b76bd0b53c289598469e33fd3ad409a1e0708b8645cd7da67c182d7140b2e043"]->getprice((isset($context["property"]) ? $context["property"] : null), true);
            echo "
          </div>
        ";
        }
        // line 28
        echo "        ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_sharing", array())) {
            // line 29
            echo "          <div class=\"social social--properties\">
            <span class=\"social__title\">";
            // line 30
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Share this:", "realtyspace")), "html", null, true);
            echo "</span>
            ";
            // line 31
            $context["__internal_85cfc5dde931a75b49eb8b86175c110f2b3bec3a21b91888398f9fa38ce0a016"] = $this->loadTemplate("macro.twig", "modules/property/single.twig", 31);
            // line 32
            echo "            ";
            echo $context["__internal_85cfc5dde931a75b49eb8b86175c110f2b3bec3a21b91888398f9fa38ce0a016"]->getsharing_links($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "social_links", array()));
            echo "
          </div>
        ";
        }
        // line 35
        echo "
        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>";
        // line 37
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Print", "realtyspace")), "html", null, true);
        echo "</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      <div class=\"property__slider\">
        ";
        // line 43
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array())) {
            // line 44
            echo "          <div class=\"property__ribon\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array()), "html", null, true);
            echo "</div>
        ";
        }
        // line 46
        echo "        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_fixed_height", array())) {
            echo " slider--fixed";
        }
        echo "\" ";
        if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_fixed_height", array())) {
            echo " data-adaptiveHeight=\"true\"";
        }
        echo ">
          ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 48
            echo "            ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_popup_original", array())) {
                // line 49
                echo "              <div data-size=\"0x0\" data-caption=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "caption", array()), "html", null, true);
                echo "\" data-item data-src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "src", array()), "html", null, true);
                echo "\"></div>
            ";
            } else {
                // line 51
                echo "              <div data-size=\"1740x960\" data-caption=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "caption", array()), "html", null, true);
                echo "\" data-item data-src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $this->getAttribute($context["image"], "src", array()), 1 => 1740, 2 => 960), "method"), "html", null, true);
                echo "\"></div>
            ";
            }
            // line 53
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "          <div class=\"slider__block\" data-slick data-wrapper>
            ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
        $context['_iterated'] = false;
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
            // line 56
            echo "              <div class=\"slider__item\">
                ";
            // line 57
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_original", array())) {
                // line 58
                echo "                  ";
                $context["href"] = $this->getAttribute($context["image"], "src", array());
                // line 59
                echo "                ";
            } else {
                // line 60
                echo "                  ";
                $context["href"] = $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $this->getAttribute($context["image"], "src", array()), 1 => 1740, 2 => 960), "method");
                // line 61
                echo "                ";
            }
            // line 62
            echo "
                ";
            // line 63
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_original", array())) {
                // line 64
                echo "                  ";
                $context["img"] = $this->getAttribute($context["image"], "src", array());
                // line 65
                echo "                ";
            } else {
                // line 66
                echo "                  ";
                $context["img"] = $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $this->getAttribute($context["image"], "src", array()), 1 => 1170, 2 => 600), "method");
                // line 67
                echo "                ";
            }
            // line 68
            echo "
                <a href=\"";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["href"]) ? $context["href"] : null), "html", null, true);
            echo "\" data-index='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' data-trigger class=\"slider__img\">
                  <img data-lazy=\"";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
            echo "/public/img/lazy-image.jpg\" alt=\"\">
                  ";
            // line 71
            if ($this->getAttribute($context["image"], "caption", array())) {
                // line 72
                echo "                    <span class=\"slider__description\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "caption", array()), "html", null, true);
                echo "</span>
                  ";
            }
            // line 74
            echo "                </a>
              </div>
            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 77
            echo "              <div class=\"slider__item\">
                <div class=\"slider__img\">";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail", array(0 => null, 1 => 870, 2 => 480), "method"), "html", null, true);
            echo " </div>
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "          </div>

          ";
        // line 83
        if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_thumbs", array())) {
            // line 84
            echo "            <div class=\"slider__controls\">
              <button type=\"button\" class=\"slider__control slider__control--prev\" data-prev>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-left\"></use>
                </svg>
              </button>
              <span class=\"slider__current\">
                <span data-current>1</span> /</span>
              <span class=\"slider__total\" data-total>";
            // line 92
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "gallery_items", array())), "html", null, true);
            echo "</span>
              <button type=\"button\" class=\"slider__control slider__control--next\" data-next>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-right\"></use>
                </svg>
              </button>
            </div>
          ";
        }
        // line 100
        echo "        </div>

        ";
        // line 102
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_thumbs", array())) {
            // line 103
            echo "          <div class=\"slider slider--thumbs js-nav-slickslider\" ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_original", array())) {
                echo " data-variablewidth=\"true\"";
            } else {
                echo " data-centermode=\"true\"";
            }
            echo ">
            <div class=\"slider__wrap\">
              <div class=\"slider__block\" data-slick>
                ";
            // line 106
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
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
                // line 107
                echo "                  <div data-slide-rel='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "' class=\"slider__item slider__item--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\">
                    <div class=\"slider__img\">
                      <img data-lazy=\"";
                // line 109
                if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_slider_original", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $this->getAttribute($context["image"], "src", array()), 1 => 270, 2 => 0), "method"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $this->getAttribute($context["image"], "src", array()), 1 => 270, 2 => 180), "method"), "html", null, true);
                }
                echo "\" src=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
                echo "/public/img/lazy-image.jpg\" alt=\"\">
                    </div>
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
            // line 113
            echo "              </div>
              <button type=\"button\" class=\"slider__control slider__control--prev\" data-prev>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-left\"></use>
                </svg>
              </button>
              <button type=\"button\" class=\"slider__control slider__control--next\" data-next>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-right\"></use>
                </svg>
              </button>
            </div>
          </div>
        ";
        }
        // line 127
        echo "      </div>
      <div class=\"property__info\">
        ";
        // line 129
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sku", array())) {
            // line 130
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("SKU", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sku", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 133
        echo "        ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array())) {
            // line 134
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 137
        echo "      </div>

      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__content\">
          <div class=\"property__plan\">
            ";
        // line 142
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array())) {
            // line 143
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 149
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Area", "realtyspace")), "html", null, true);
            echo " (";
            echo $this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "current_unit_label", array());
            echo ")</dd>
                <dd class=\"property__plan-value\">";
            // line 150
            echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array()), false));
            echo "</dd>
              </dl>
            ";
        }
        // line 153
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array())) {
            // line 154
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 160
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 161
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 164
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array())) {
            // line 165
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bathrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 171
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 172
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 175
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array())) {
            // line 176
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bedrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 182
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 183
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 186
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "garages", array())) {
            // line 187
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 193
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 194
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "garages", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 197
        echo "          </div>
        </div>
      </div>
      ";
        // line 200
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_space_section", array()) && (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "additional_details", array()) || $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "year_built", array())) || $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array())))) {
            // line 201
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 203
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("The space", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list\">
                ";
            // line 208
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array())) {
                // line 209
                echo "                  <li>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Land Size", "realtyspace")), "html", null, true);
                echo ": <strong>";
                echo _twig_default_filter(call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array()))), "-");
                echo "</strong></li>
                ";
            }
            // line 211
            echo "                ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "year_built", array())) {
                // line 212
                echo "                  <li>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Year Built", "realtyspace")), "html", null, true);
                echo ": <strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "year_built", array()), "html", null, true);
                echo "</strong>
                  </li>
                ";
            }
            // line 215
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "additional_details", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 216
                echo "                  <li>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo ": <strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", array()), "html", null, true);
                echo "</strong></li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 218
            echo "              </ul>
            </div>
          </div>
        </div>
      ";
        }
        // line 223
        echo "
      ";
        // line 224
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_amenities_section", array()) && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "features", array()))) {
            // line 225
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 227
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Amenities", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                ";
            // line 232
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "features", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
                // line 233
                echo "                  <li>";
                echo $this->getAttribute($context["feature"], "name", array());
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 235
            echo "              </ul>
            </div>
          </div>
        </div>
      ";
        }
        // line 240
        echo "
      ";
        // line 241
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_description", array()) && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "content", array()))) {
            // line 242
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 244
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Description", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">";
            // line 248
            echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "content", array());
            echo "</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">";
            // line 249
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("More information ...", "realtyspace")), "html", null, true);
            echo "</button>
            </div>
          </div>
        </div>
      ";
        }
        // line 254
        echo "
      ";
        // line 255
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "attachments", array())) {
            // line 256
            echo "        <div class=\"widget js-widget widget--details widget--attachments\">
          <div class=\"widget__content\">
            <div class=\"property__files js-unhide-block\">
              <h3 class=\"widget__title\">";
            // line 259
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Attachments", "realtyspace")), "html", null, true);
            echo "</h3>
              ";
            // line 260
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "attachments", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                // line 261
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["attachment"], "url", array()), "html", null, true);
                echo "\" class=\"property__files-item\" target=\"_blank\">
                  <svg class=\"property__files-icon\">
                    <use xlink:href=\"#icon-doc\"></use>
                  </svg>
                  ";
                // line 265
                echo twig_escape_filter($this->env, (($this->getAttribute($context["attachment"], "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["attachment"], "title", array()), $this->getAttribute($context["attachment"], "filename", array()))) : ($this->getAttribute($context["attachment"], "filename", array()))), "html", null, true);
                echo "
                </a>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 268
            echo "            </div>
            <button type=\"button\" class=\"property__files-show js-unhide\">";
            // line 269
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Show attachments", "realtyspace")), "html", null, true);
            echo "</button>
          </div>
        </div>

      ";
        }
        // line 274
        echo "

      ";
        // line 276
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "video_tour", array())) {
            // line 277
            echo "        <div class=\"widget js-widget widget--details widget--video-tour\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 279
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Video tour", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__video\">
              ";
            // line 283
            echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "video_tour", array());
            echo "
            </div>
          </div>
        </div>

      ";
        }
        // line 289
        echo "
      <div class=\"property__photos--print js-photos-print\">
        ";
        // line 291
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 292
            echo "          <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $this->getAttribute($context["image"], "src", array()), 1 => 800, 2 => 0), "method"), "html", null, true);
            echo "\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 294
        echo "      </div>

      ";
        // line 296
        if (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "map_location", array()) && ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_panorama", array())))) {
            // line 297
            echo "        ";
            $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("panoramaMapSwitcher", array("showPanorama" => $this->getAttribute(            // line 298
(isset($context["page"]) ? $context["page"] : null), "show_panorama", array()), "showMap" => $this->getAttribute(            // line 299
(isset($context["page"]) ? $context["page"] : null), "show_map", array()), "mapType" => $this->getAttribute(            // line 300
(isset($context["page"]) ? $context["page"] : null), "map_type", array()), "mapZoom" => $this->getAttribute(            // line 301
(isset($context["page"]) ? $context["page"] : null), "map_zoom", array()), "location" => $this->getAttribute(            // line 302
(isset($context["property"]) ? $context["property"] : null), "map_location", array()))));
            // line 304
            echo "
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"";
            // line 307
            echo twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "html", null, true);
            echo "\">
              <div class=\"map__buttons\">
                ";
            // line 309
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map", array())) {
                // line 310
                echo "                  <button type=\"button\" class=\"map__change-map js-map-btn active\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Map", "realtyspace")), "html", null, true);
                echo "</button>
                ";
            }
            // line 312
            echo "                ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_panorama", array())) {
                // line 313
                echo "                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Street view", "realtyspace")), "html", null, true);
                echo "</button>
                ";
            }
            // line 315
            echo "              </div>
              <div class=\"map__wrap\">
                ";
            // line 317
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_map", array())) {
                // line 318
                echo "                  <div data-type=\"map\" class=\"map__view js-map-canvas\"></div>
                ";
            }
            // line 320
            echo "                ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_panorama", array())) {
                // line 321
                echo "                  <div data-type=\"panorama\" class=\"map__view map__view--panorama js-map-canvas\"></div>
                ";
            }
            // line 323
            echo "              </div>
            </div>
          </div>
        </div>
      ";
        }
        // line 328
        echo "      ";
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_agent", array()) && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()))) {
            // line 329
            echo "        ";
            $context["__internal_3c799a228e9476c072cf6baf8676a866119dec85742dfd8d7a8bcf27bbef34d6"] = $this->loadTemplate("macro.twig", "modules/property/single.twig", 329);
            // line 330
            echo "        ";
            $context["__internal_5c81a516600dd31bec30c8b9f07467995cd92bab26bbe854c69411d310f75ddc"] = $this->loadTemplate("modules/agent/macro.twig", "modules/property/single.twig", 330);
            // line 331
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            ";
            // line 333
            if ($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "is_user", array())) {
                // line 334
                echo "              <h3 class=\"widget__title\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contact the owner", "realtyspace")), "html", null, true);
                echo "</h3>
            ";
            } else {
                // line 336
                echo "              <h3 class=\"widget__title\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contact the Agent", "realtyspace")), "html", null, true);
                echo "</h3>
            ";
            }
            // line 338
            echo "          </div>
          <div class=\"widget__content\">
            <div class=\"property__contact js-unhide-block\">
              <div class=\"worker worker--list worker--details\">
                <div class=\"worker__item vcard\">
                  ";
            // line 343
            echo $context["__internal_5c81a516600dd31bec30c8b9f07467995cd92bab26bbe854c69411d310f75ddc"]->getphoto($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), 500, 480, true);
            echo "
                  <div class=\"worker__intro\">
                    <div class=\"worker__intro-head\">
                      <div class=\"worker__intro-name\">
                        <h3 class=\"worker__name fn\">
                          <a href=\"";
            // line 348
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "link", array()), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "name", array());
            echo "</a></h3>
                        <div class=\"worker__post\">";
            // line 349
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "job_title", array()), "html", null, true);
            echo "</div>
                        <button type=\"button\" class=\"worker__show js-unhide\">";
            // line 350
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contact agent", "realtyspace")), "html", null, true);
            echo "</button>
                      </div>
                    </div>
                    <div class=\"worker__intro-row\">
                      <div class=\"worker__intro-col\">
                        ";
            // line 355
            echo $context["__internal_5c81a516600dd31bec30c8b9f07467995cd92bab26bbe854c69411d310f75ddc"]->getcontacts($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()));
            echo "
                      </div>
                      <div class=\"worker__intro-col\">
                        ";
            // line 358
            echo $context["__internal_5c81a516600dd31bec30c8b9f07467995cd92bab26bbe854c69411d310f75ddc"]->getsocial($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()));
            echo "
                      </div>
                    </div>
                  </div>
                  ";
            // line 362
            if ($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "content", array())) {
                // line 363
                echo "                    <div class=\"worker__descr\">
                      ";
                // line 364
                echo wp_trim_words($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "content", array()), 150);
                echo "
                    </div>
                  ";
            }
            // line 367
            echo "                  <!-- end of block .worker__descr-->
                  <div class=\"clearfix\"></div>
                </div>
                <!-- end of block .worker__item-->
              </div>
              ";
            // line 372
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_form_id", array())) {
                // line 373
                echo "                <div class=\"property__contact-form\">
                  <div class=\"form form--property-agent\">
                    ";
                // line 375
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "agent_form", array());
                echo "
                  </div>
                </div>
              ";
            }
            // line 379
            echo "              <div class=\"clearfix\"></div>
            </div>
          </div>
        </div>
      ";
        }
        // line 384
        echo "

      ";
        // line 386
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_tags_section", array()) && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "tags", array()))) {
            // line 387
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 389
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Tags", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            ";
            // line 392
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "tags", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 393
                echo "              <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "link", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
                echo "</a> ";
                echo (( !$this->getAttribute($context["loop"], "last", array())) ? (", ") : (""));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 395
            echo "          </div>
        </div>
      ";
        }
        // line 398
        echo "    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
";
    }

    // line 404
    public function block_subcontent($context, array $blocks = array())
    {
        // line 405
        echo "  ";
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_related", array()) && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array()))) {
            // line 406
            echo "    ";
            $this->loadTemplate("modules/property/single.twig", "modules/property/single.twig", 406, "197390751")->display($context);
            // line 421
            echo "  ";
        }
    }

    public function getTemplateName()
    {
        return "modules/property/single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1005 => 421,  1002 => 406,  999 => 405,  996 => 404,  988 => 398,  983 => 395,  962 => 393,  945 => 392,  939 => 389,  935 => 387,  933 => 386,  929 => 384,  922 => 379,  915 => 375,  911 => 373,  909 => 372,  902 => 367,  896 => 364,  893 => 363,  891 => 362,  884 => 358,  878 => 355,  870 => 350,  866 => 349,  860 => 348,  852 => 343,  845 => 338,  839 => 336,  833 => 334,  831 => 333,  827 => 331,  824 => 330,  821 => 329,  818 => 328,  811 => 323,  807 => 321,  804 => 320,  800 => 318,  798 => 317,  794 => 315,  788 => 313,  785 => 312,  779 => 310,  777 => 309,  772 => 307,  767 => 304,  765 => 302,  764 => 301,  763 => 300,  762 => 299,  761 => 298,  759 => 297,  757 => 296,  753 => 294,  744 => 292,  740 => 291,  736 => 289,  727 => 283,  720 => 279,  716 => 277,  714 => 276,  710 => 274,  702 => 269,  699 => 268,  690 => 265,  682 => 261,  678 => 260,  674 => 259,  669 => 256,  667 => 255,  664 => 254,  656 => 249,  652 => 248,  645 => 244,  641 => 242,  639 => 241,  636 => 240,  629 => 235,  620 => 233,  616 => 232,  608 => 227,  604 => 225,  602 => 224,  599 => 223,  592 => 218,  581 => 216,  576 => 215,  567 => 212,  564 => 211,  556 => 209,  554 => 208,  546 => 203,  542 => 201,  540 => 200,  535 => 197,  529 => 194,  525 => 193,  517 => 187,  514 => 186,  508 => 183,  504 => 182,  496 => 176,  493 => 175,  487 => 172,  483 => 171,  475 => 165,  472 => 164,  466 => 161,  462 => 160,  454 => 154,  451 => 153,  445 => 150,  439 => 149,  431 => 143,  429 => 142,  422 => 137,  413 => 134,  410 => 133,  401 => 130,  399 => 129,  395 => 127,  379 => 113,  355 => 109,  347 => 107,  330 => 106,  319 => 103,  317 => 102,  313 => 100,  302 => 92,  292 => 84,  290 => 83,  286 => 81,  277 => 78,  274 => 77,  259 => 74,  253 => 72,  251 => 71,  245 => 70,  239 => 69,  236 => 68,  233 => 67,  230 => 66,  227 => 65,  224 => 64,  222 => 63,  219 => 62,  216 => 61,  213 => 60,  210 => 59,  207 => 58,  205 => 57,  202 => 56,  184 => 55,  181 => 54,  175 => 53,  167 => 51,  159 => 49,  156 => 48,  152 => 47,  141 => 46,  135 => 44,  133 => 43,  124 => 37,  120 => 35,  113 => 32,  111 => 31,  107 => 30,  104 => 29,  101 => 28,  95 => 25,  92 => 24,  90 => 23,  85 => 20,  67 => 18,  50 => 17,  45 => 15,  39 => 11,  36 => 10,  32 => 5,  30 => 9,  28 => 7,  26 => 6,  11 => 5,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var page \\cf47\\theme\\realtyspace\\module\\property\\viewmodel\\DetailsViewModel #}
{# @var property \\cf47\\plugin\\realtyspace\\module\\property\\Entity #}


{% extends 'base-archive.twig' %}
{% from 'modules/property/macro.twig' import price %}
{% from 'macro.twig' import widget_header %}

{% set property = page.property %}
{% block content %}
  <div class=\"site site--main\">
    <!-- BEGIN PROPERTY DETAILS-->
    <div class=\"property\">
      <h1 class=\"property__title\">
        {{ property.title|raw }}
        <span class=\"property__city\">
                {% for location_part in property.location() %}
                  {{ location_part.name }}{{ not loop.last ? ',' }}
                {% endfor %}
                </span>
      </h1>
      <div class=\"property__header\">
        {% if page.show_price_box %}
          <div class=\"property__price\">
            {{ price(property, true) }}
          </div>
        {% endif %}
        {% if page.show_sharing %}
          <div class=\"social social--properties\">
            <span class=\"social__title\">{{ __('Share this:', 'realtyspace') }}</span>
            {% from 'macro.twig' import sharing_links %}
            {{ sharing_links(page.social_links) }}
          </div>
        {% endif %}

        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>{{ __('Print', 'realtyspace') }}</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      <div class=\"property__slider\">
        {% if property.contract_type %}
          <div class=\"property__ribon\">{{ property.contract_type }}</div>
        {% endif %}
        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery {% if page.show_slider_fixed_height %} slider--fixed{% endif %}\" {% if not page.show_slider_fixed_height %} data-adaptiveHeight=\"true\"{% endif %}>
          {% for image in property.images %}
            {% if page.show_popup_original %}
              <div data-size=\"0x0\" data-caption=\"{{ image.caption }}\" data-item data-src=\"{{ image.src }}\"></div>
            {% else %}
              <div data-size=\"1740x960\" data-caption=\"{{ image.caption }}\" data-item data-src=\"{{ macro.thumbnail_src(image.src, 1740, 960) }}\"></div>
            {% endif %}
          {% endfor %}
          <div class=\"slider__block\" data-slick data-wrapper>
            {% for image in property.images %}
              <div class=\"slider__item\">
                {% if page.show_slider_original %}
                  {% set href= image.src %}
                {% else %}
                  {% set href = macro.thumbnail_src(image.src, 1740, 960) %}
                {% endif %}

                {% if page.show_slider_original %}
                  {% set img = image.src %}
                {% else %}
                  {% set img = macro.thumbnail_src(image.src, 1170, 600) %}
                {% endif %}

                <a href=\"{{ href }}\" data-index='{{ loop.index0 }}' data-trigger class=\"slider__img\">
                  <img data-lazy=\"{{ img }}\" src=\"{{ fn('get_template_directory_uri') }}/public/img/lazy-image.jpg\" alt=\"\">
                  {% if image.caption %}
                    <span class=\"slider__description\">{{ image.caption }}</span>
                  {% endif %}
                </a>
              </div>
            {% else %}
              <div class=\"slider__item\">
                <div class=\"slider__img\">{{ macro.thumbnail(null, 870, 480) }} </div>
              </div>
            {% endfor %}
          </div>

          {% if not page.show_slider_thumbs %}
            <div class=\"slider__controls\">
              <button type=\"button\" class=\"slider__control slider__control--prev\" data-prev>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-left\"></use>
                </svg>
              </button>
              <span class=\"slider__current\">
                <span data-current>1</span> /</span>
              <span class=\"slider__total\" data-total>{{ post.gallery_items|length }}</span>
              <button type=\"button\" class=\"slider__control slider__control--next\" data-next>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-right\"></use>
                </svg>
              </button>
            </div>
          {% endif %}
        </div>

        {% if page.show_slider_thumbs %}
          <div class=\"slider slider--thumbs js-nav-slickslider\" {% if page.show_slider_original %} data-variablewidth=\"true\"{% else %} data-centermode=\"true\"{% endif %}>
            <div class=\"slider__wrap\">
              <div class=\"slider__block\" data-slick>
                {% for image in property.images %}
                  <div data-slide-rel='{{ loop.index0 }}' class=\"slider__item slider__item--{{ loop.index0 }}\">
                    <div class=\"slider__img\">
                      <img data-lazy=\"{% if page.show_slider_original %}{{ macro.thumbnail_src(image.src, 270, 0) }}{% else %}{{ macro.thumbnail_src(image.src, 270, 180) }}{% endif %}\" src=\"{{ fn('get_template_directory_uri') }}/public/img/lazy-image.jpg\" alt=\"\">
                    </div>
                  </div>
                {% endfor %}
              </div>
              <button type=\"button\" class=\"slider__control slider__control--prev\" data-prev>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-left\"></use>
                </svg>
              </button>
              <button type=\"button\" class=\"slider__control slider__control--next\" data-next>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-right\"></use>
                </svg>
              </button>
            </div>
          </div>
        {% endif %}
      </div>
      <div class=\"property__info\">
        {% if property.sku %}
          <div class=\"property__info-item\">{{ __('SKU', 'realtyspace') }}:<strong> {{ property.sku }}</strong>
          </div>
        {% endif %}
        {% if property.type %}
          <div class=\"property__info-item\">{{ __('Property type', 'realtyspace') }}:<strong> {{ property.type }}</strong>
          </div>
        {% endif %}
      </div>

      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__content\">
          <div class=\"property__plan\">
            {% if property.area %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Area', 'realtyspace') }} ({{ wparea.current_unit_label|raw }})</dd>
                <dd class=\"property__plan-value\">{{ property.area|area(false) }}</dd>
              </dl>
            {% endif %}
            {% if property.rooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Rooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.rooms }}</dd>
              </dl>
            {% endif %}
            {% if property.bathrooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bathrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Bathrooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.bathrooms }}</dd>
              </dl>
            {% endif %}
            {% if property.bedrooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bedrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Bedrooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.bedrooms }}</dd>
              </dl>
            {% endif %}
            {% if property.garages %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Garages', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.garages }}</dd>
              </dl>
            {% endif %}
          </div>
        </div>
      </div>
      {% if page.show_space_section and (property.additional_details or property.year_built or property.land_area) %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('The space', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list\">
                {% if property.land_area %}
                  <li>{{ __('Land Size', 'realtyspace') }}: <strong>{{ property.land_area|area|default('-')|raw }}</strong></li>
                {% endif %}
                {% if property.year_built %}
                  <li>{{ __('Year Built', 'realtyspace') }}: <strong>{{ property.year_built }}</strong>
                  </li>
                {% endif %}
                {% for item in property.additional_details %}
                  <li>{{ item.name }}: <strong>{{ item.value }}</strong></li>
                {% endfor %}
              </ul>
            </div>
          </div>
        </div>
      {% endif %}

      {% if page.show_amenities_section and property.features %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Amenities', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                {% for feature in property.features %}
                  <li>{{ feature.name|raw }}</li>
                {% endfor %}
              </ul>
            </div>
          </div>
        </div>
      {% endif %}

      {% if page.show_description and property.content %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Description', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">{{ property.content|raw }}</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">{{ __('More information ...', 'realtyspace') }}</button>
            </div>
          </div>
        </div>
      {% endif %}

      {% if property.attachments %}
        <div class=\"widget js-widget widget--details widget--attachments\">
          <div class=\"widget__content\">
            <div class=\"property__files js-unhide-block\">
              <h3 class=\"widget__title\">{{ __('Attachments', 'realtyspace') }}</h3>
              {% for attachment in property.attachments %}
                <a href=\"{{ attachment.url }}\" class=\"property__files-item\" target=\"_blank\">
                  <svg class=\"property__files-icon\">
                    <use xlink:href=\"#icon-doc\"></use>
                  </svg>
                  {{ attachment.title|default(attachment.filename) }}
                </a>
              {% endfor %}
            </div>
            <button type=\"button\" class=\"property__files-show js-unhide\">{{ __('Show attachments', 'realtyspace') }}</button>
          </div>
        </div>

      {% endif %}


      {% if property.video_tour %}
        <div class=\"widget js-widget widget--details widget--video-tour\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Video tour', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__video\">
              {{ property.video_tour|raw }}
            </div>
          </div>
        </div>

      {% endif %}

      <div class=\"property__photos--print js-photos-print\">
        {% for image in property.images %}
          <img src=\"{{ macro.thumbnail_src(image.src, 800, 0) }}\">
        {% endfor %}
      </div>

      {% if property.map_location and (page.show_map or page.show_panorama) %}
        {% set module_id = js_module('panoramaMapSwitcher',{
        'showPanorama': page.show_panorama,
        'showMap': page.show_map,
        'mapType': page.map_type,
        'mapZoom': page.map_zoom,
        'location': property.map_location,
        }) %}

        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"{{ module_id }}\">
              <div class=\"map__buttons\">
                {% if page.show_map %}
                  <button type=\"button\" class=\"map__change-map js-map-btn active\">{{ __('Map', 'realtyspace') }}</button>
                {% endif %}
                {% if page.show_panorama %}
                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">{{ __('Street view', 'realtyspace') }}</button>
                {% endif %}
              </div>
              <div class=\"map__wrap\">
                {% if page.show_map %}
                  <div data-type=\"map\" class=\"map__view js-map-canvas\"></div>
                {% endif %}
                {% if page.show_panorama %}
                  <div data-type=\"panorama\" class=\"map__view map__view--panorama js-map-canvas\"></div>
                {% endif %}
              </div>
            </div>
          </div>
        </div>
      {% endif %}
      {% if page.show_agent and property.agent %}
        {% from 'macro.twig' import thumbnail %}
        {% from 'modules/agent/macro.twig' import contacts, social, photo %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            {% if property.agent.is_user %}
              <h3 class=\"widget__title\">{{ __('Contact the owner', 'realtyspace') }}</h3>
            {% else %}
              <h3 class=\"widget__title\">{{ __('Contact the Agent', 'realtyspace') }}</h3>
            {% endif %}
          </div>
          <div class=\"widget__content\">
            <div class=\"property__contact js-unhide-block\">
              <div class=\"worker worker--list worker--details\">
                <div class=\"worker__item vcard\">
                  {{ photo(property.agent, 500, 480, true) }}
                  <div class=\"worker__intro\">
                    <div class=\"worker__intro-head\">
                      <div class=\"worker__intro-name\">
                        <h3 class=\"worker__name fn\">
                          <a href=\"{{ property.agent.link }}\">{{ property.agent.name|raw }}</a></h3>
                        <div class=\"worker__post\">{{ property.agent.job_title }}</div>
                        <button type=\"button\" class=\"worker__show js-unhide\">{{ __('Contact agent', 'realtyspace') }}</button>
                      </div>
                    </div>
                    <div class=\"worker__intro-row\">
                      <div class=\"worker__intro-col\">
                        {{ contacts(property.agent) }}
                      </div>
                      <div class=\"worker__intro-col\">
                        {{ social(property.agent) }}
                      </div>
                    </div>
                  </div>
                  {% if property.agent.content %}
                    <div class=\"worker__descr\">
                      {{ property.agent.content|excerpt(150)|raw }}
                    </div>
                  {% endif %}
                  <!-- end of block .worker__descr-->
                  <div class=\"clearfix\"></div>
                </div>
                <!-- end of block .worker__item-->
              </div>
              {% if page.agent_form_id %}
                <div class=\"property__contact-form\">
                  <div class=\"form form--property-agent\">
                    {{ page.agent_form|raw }}
                  </div>
                </div>
              {% endif %}
              <div class=\"clearfix\"></div>
            </div>
          </div>
        </div>
      {% endif %}


      {% if page.show_tags_section and property.tags %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Tags', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            {% for tag in property.tags %}
              <a href=\"{{ tag.link }}\">{{ tag }}</a> {{ not loop.last ? ', ' }}
            {% endfor %}
          </div>
        </div>
      {% endif %}
    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
{% endblock %}

{% block subcontent %}
  {% if page.show_related and property.related_properties %}
    {% embed 'section-widget.twig' %}
      {% from 'modules/property/macro.twig' import items as property_items %}
      {% from 'macro.twig' import widget_header %}
      {% set widget_class='landing collapsing' %}

      {% block header %}
        {{ widget_header(__('Similar properties', 'realtyspace')) }}
      {% endblock %}

      {% block content %}
        <div class=\"listing listing--grid properties properties--grid\">
          {{ property_items(property.related_properties, 'grid') }}
        </div>
      {% endblock %}
    {% endembed %}
  {% endif %}
{% endblock %}
", "modules/property/single.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/single.twig");
    }
}


/* modules/property/single.twig */
class __TwigTemplate_314638bffa95800c411c1b5b2f1e5ddbf21876389073d44f8b7c3e60b6ae794c_197390751 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 406
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/property/single.twig", 406);
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
        // line 407
        $context["__internal_65bd9d6a559f8b61bfbece4dc4d9072cc5aada4408c3ab2e6f24ea76da9c64cf"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/single.twig", 407);
        // line 408
        $context["__internal_7385727cf58d9ffc0d2d8f1fa3d245c5bb7e81aeba705aaf64537900cddff51b"] = $this->loadTemplate("macro.twig", "modules/property/single.twig", 408);
        // line 409
        $context["widget_class"] = "landing collapsing";
        // line 406
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 411
    public function block_header($context, array $blocks = array())
    {
        // line 412
        echo "        ";
        echo $context["__internal_7385727cf58d9ffc0d2d8f1fa3d245c5bb7e81aeba705aaf64537900cddff51b"]->getwidget_header(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Similar properties", "realtyspace")));
        echo "
      ";
    }

    // line 415
    public function block_content($context, array $blocks = array())
    {
        // line 416
        echo "        <div class=\"listing listing--grid properties properties--grid\">
          ";
        // line 417
        echo $context["__internal_65bd9d6a559f8b61bfbece4dc4d9072cc5aada4408c3ab2e6f24ea76da9c64cf"]->getitems($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array()), "grid");
        echo "
        </div>
      ";
    }

    public function getTemplateName()
    {
        return "modules/property/single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1510 => 417,  1507 => 416,  1504 => 415,  1497 => 412,  1494 => 411,  1490 => 406,  1488 => 409,  1486 => 408,  1484 => 407,  1469 => 406,  1005 => 421,  1002 => 406,  999 => 405,  996 => 404,  988 => 398,  983 => 395,  962 => 393,  945 => 392,  939 => 389,  935 => 387,  933 => 386,  929 => 384,  922 => 379,  915 => 375,  911 => 373,  909 => 372,  902 => 367,  896 => 364,  893 => 363,  891 => 362,  884 => 358,  878 => 355,  870 => 350,  866 => 349,  860 => 348,  852 => 343,  845 => 338,  839 => 336,  833 => 334,  831 => 333,  827 => 331,  824 => 330,  821 => 329,  818 => 328,  811 => 323,  807 => 321,  804 => 320,  800 => 318,  798 => 317,  794 => 315,  788 => 313,  785 => 312,  779 => 310,  777 => 309,  772 => 307,  767 => 304,  765 => 302,  764 => 301,  763 => 300,  762 => 299,  761 => 298,  759 => 297,  757 => 296,  753 => 294,  744 => 292,  740 => 291,  736 => 289,  727 => 283,  720 => 279,  716 => 277,  714 => 276,  710 => 274,  702 => 269,  699 => 268,  690 => 265,  682 => 261,  678 => 260,  674 => 259,  669 => 256,  667 => 255,  664 => 254,  656 => 249,  652 => 248,  645 => 244,  641 => 242,  639 => 241,  636 => 240,  629 => 235,  620 => 233,  616 => 232,  608 => 227,  604 => 225,  602 => 224,  599 => 223,  592 => 218,  581 => 216,  576 => 215,  567 => 212,  564 => 211,  556 => 209,  554 => 208,  546 => 203,  542 => 201,  540 => 200,  535 => 197,  529 => 194,  525 => 193,  517 => 187,  514 => 186,  508 => 183,  504 => 182,  496 => 176,  493 => 175,  487 => 172,  483 => 171,  475 => 165,  472 => 164,  466 => 161,  462 => 160,  454 => 154,  451 => 153,  445 => 150,  439 => 149,  431 => 143,  429 => 142,  422 => 137,  413 => 134,  410 => 133,  401 => 130,  399 => 129,  395 => 127,  379 => 113,  355 => 109,  347 => 107,  330 => 106,  319 => 103,  317 => 102,  313 => 100,  302 => 92,  292 => 84,  290 => 83,  286 => 81,  277 => 78,  274 => 77,  259 => 74,  253 => 72,  251 => 71,  245 => 70,  239 => 69,  236 => 68,  233 => 67,  230 => 66,  227 => 65,  224 => 64,  222 => 63,  219 => 62,  216 => 61,  213 => 60,  210 => 59,  207 => 58,  205 => 57,  202 => 56,  184 => 55,  181 => 54,  175 => 53,  167 => 51,  159 => 49,  156 => 48,  152 => 47,  141 => 46,  135 => 44,  133 => 43,  124 => 37,  120 => 35,  113 => 32,  111 => 31,  107 => 30,  104 => 29,  101 => 28,  95 => 25,  92 => 24,  90 => 23,  85 => 20,  67 => 18,  50 => 17,  45 => 15,  39 => 11,  36 => 10,  32 => 5,  30 => 9,  28 => 7,  26 => 6,  11 => 5,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var page \\cf47\\theme\\realtyspace\\module\\property\\viewmodel\\DetailsViewModel #}
{# @var property \\cf47\\plugin\\realtyspace\\module\\property\\Entity #}


{% extends 'base-archive.twig' %}
{% from 'modules/property/macro.twig' import price %}
{% from 'macro.twig' import widget_header %}

{% set property = page.property %}
{% block content %}
  <div class=\"site site--main\">
    <!-- BEGIN PROPERTY DETAILS-->
    <div class=\"property\">
      <h1 class=\"property__title\">
        {{ property.title|raw }}
        <span class=\"property__city\">
                {% for location_part in property.location() %}
                  {{ location_part.name }}{{ not loop.last ? ',' }}
                {% endfor %}
                </span>
      </h1>
      <div class=\"property__header\">
        {% if page.show_price_box %}
          <div class=\"property__price\">
            {{ price(property, true) }}
          </div>
        {% endif %}
        {% if page.show_sharing %}
          <div class=\"social social--properties\">
            <span class=\"social__title\">{{ __('Share this:', 'realtyspace') }}</span>
            {% from 'macro.twig' import sharing_links %}
            {{ sharing_links(page.social_links) }}
          </div>
        {% endif %}

        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>{{ __('Print', 'realtyspace') }}</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      <div class=\"property__slider\">
        {% if property.contract_type %}
          <div class=\"property__ribon\">{{ property.contract_type }}</div>
        {% endif %}
        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery {% if page.show_slider_fixed_height %} slider--fixed{% endif %}\" {% if not page.show_slider_fixed_height %} data-adaptiveHeight=\"true\"{% endif %}>
          {% for image in property.images %}
            {% if page.show_popup_original %}
              <div data-size=\"0x0\" data-caption=\"{{ image.caption }}\" data-item data-src=\"{{ image.src }}\"></div>
            {% else %}
              <div data-size=\"1740x960\" data-caption=\"{{ image.caption }}\" data-item data-src=\"{{ macro.thumbnail_src(image.src, 1740, 960) }}\"></div>
            {% endif %}
          {% endfor %}
          <div class=\"slider__block\" data-slick data-wrapper>
            {% for image in property.images %}
              <div class=\"slider__item\">
                {% if page.show_slider_original %}
                  {% set href= image.src %}
                {% else %}
                  {% set href = macro.thumbnail_src(image.src, 1740, 960) %}
                {% endif %}

                {% if page.show_slider_original %}
                  {% set img = image.src %}
                {% else %}
                  {% set img = macro.thumbnail_src(image.src, 1170, 600) %}
                {% endif %}

                <a href=\"{{ href }}\" data-index='{{ loop.index0 }}' data-trigger class=\"slider__img\">
                  <img data-lazy=\"{{ img }}\" src=\"{{ fn('get_template_directory_uri') }}/public/img/lazy-image.jpg\" alt=\"\">
                  {% if image.caption %}
                    <span class=\"slider__description\">{{ image.caption }}</span>
                  {% endif %}
                </a>
              </div>
            {% else %}
              <div class=\"slider__item\">
                <div class=\"slider__img\">{{ macro.thumbnail(null, 870, 480) }} </div>
              </div>
            {% endfor %}
          </div>

          {% if not page.show_slider_thumbs %}
            <div class=\"slider__controls\">
              <button type=\"button\" class=\"slider__control slider__control--prev\" data-prev>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-left\"></use>
                </svg>
              </button>
              <span class=\"slider__current\">
                <span data-current>1</span> /</span>
              <span class=\"slider__total\" data-total>{{ post.gallery_items|length }}</span>
              <button type=\"button\" class=\"slider__control slider__control--next\" data-next>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-right\"></use>
                </svg>
              </button>
            </div>
          {% endif %}
        </div>

        {% if page.show_slider_thumbs %}
          <div class=\"slider slider--thumbs js-nav-slickslider\" {% if page.show_slider_original %} data-variablewidth=\"true\"{% else %} data-centermode=\"true\"{% endif %}>
            <div class=\"slider__wrap\">
              <div class=\"slider__block\" data-slick>
                {% for image in property.images %}
                  <div data-slide-rel='{{ loop.index0 }}' class=\"slider__item slider__item--{{ loop.index0 }}\">
                    <div class=\"slider__img\">
                      <img data-lazy=\"{% if page.show_slider_original %}{{ macro.thumbnail_src(image.src, 270, 0) }}{% else %}{{ macro.thumbnail_src(image.src, 270, 180) }}{% endif %}\" src=\"{{ fn('get_template_directory_uri') }}/public/img/lazy-image.jpg\" alt=\"\">
                    </div>
                  </div>
                {% endfor %}
              </div>
              <button type=\"button\" class=\"slider__control slider__control--prev\" data-prev>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-left\"></use>
                </svg>
              </button>
              <button type=\"button\" class=\"slider__control slider__control--next\" data-next>
                <svg class=\"slider__control-icon\">
                  <use xlink:href=\"#icon-arrow-right\"></use>
                </svg>
              </button>
            </div>
          </div>
        {% endif %}
      </div>
      <div class=\"property__info\">
        {% if property.sku %}
          <div class=\"property__info-item\">{{ __('SKU', 'realtyspace') }}:<strong> {{ property.sku }}</strong>
          </div>
        {% endif %}
        {% if property.type %}
          <div class=\"property__info-item\">{{ __('Property type', 'realtyspace') }}:<strong> {{ property.type }}</strong>
          </div>
        {% endif %}
      </div>

      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__content\">
          <div class=\"property__plan\">
            {% if property.area %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Area', 'realtyspace') }} ({{ wparea.current_unit_label|raw }})</dd>
                <dd class=\"property__plan-value\">{{ property.area|area(false) }}</dd>
              </dl>
            {% endif %}
            {% if property.rooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Rooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.rooms }}</dd>
              </dl>
            {% endif %}
            {% if property.bathrooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bathrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Bathrooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.bathrooms }}</dd>
              </dl>
            {% endif %}
            {% if property.bedrooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bedrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Bedrooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.bedrooms }}</dd>
              </dl>
            {% endif %}
            {% if property.garages %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Garages', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.garages }}</dd>
              </dl>
            {% endif %}
          </div>
        </div>
      </div>
      {% if page.show_space_section and (property.additional_details or property.year_built or property.land_area) %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('The space', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list\">
                {% if property.land_area %}
                  <li>{{ __('Land Size', 'realtyspace') }}: <strong>{{ property.land_area|area|default('-')|raw }}</strong></li>
                {% endif %}
                {% if property.year_built %}
                  <li>{{ __('Year Built', 'realtyspace') }}: <strong>{{ property.year_built }}</strong>
                  </li>
                {% endif %}
                {% for item in property.additional_details %}
                  <li>{{ item.name }}: <strong>{{ item.value }}</strong></li>
                {% endfor %}
              </ul>
            </div>
          </div>
        </div>
      {% endif %}

      {% if page.show_amenities_section and property.features %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Amenities', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                {% for feature in property.features %}
                  <li>{{ feature.name|raw }}</li>
                {% endfor %}
              </ul>
            </div>
          </div>
        </div>
      {% endif %}

      {% if page.show_description and property.content %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Description', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">{{ property.content|raw }}</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">{{ __('More information ...', 'realtyspace') }}</button>
            </div>
          </div>
        </div>
      {% endif %}

      {% if property.attachments %}
        <div class=\"widget js-widget widget--details widget--attachments\">
          <div class=\"widget__content\">
            <div class=\"property__files js-unhide-block\">
              <h3 class=\"widget__title\">{{ __('Attachments', 'realtyspace') }}</h3>
              {% for attachment in property.attachments %}
                <a href=\"{{ attachment.url }}\" class=\"property__files-item\" target=\"_blank\">
                  <svg class=\"property__files-icon\">
                    <use xlink:href=\"#icon-doc\"></use>
                  </svg>
                  {{ attachment.title|default(attachment.filename) }}
                </a>
              {% endfor %}
            </div>
            <button type=\"button\" class=\"property__files-show js-unhide\">{{ __('Show attachments', 'realtyspace') }}</button>
          </div>
        </div>

      {% endif %}


      {% if property.video_tour %}
        <div class=\"widget js-widget widget--details widget--video-tour\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Video tour', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__video\">
              {{ property.video_tour|raw }}
            </div>
          </div>
        </div>

      {% endif %}

      <div class=\"property__photos--print js-photos-print\">
        {% for image in property.images %}
          <img src=\"{{ macro.thumbnail_src(image.src, 800, 0) }}\">
        {% endfor %}
      </div>

      {% if property.map_location and (page.show_map or page.show_panorama) %}
        {% set module_id = js_module('panoramaMapSwitcher',{
        'showPanorama': page.show_panorama,
        'showMap': page.show_map,
        'mapType': page.map_type,
        'mapZoom': page.map_zoom,
        'location': property.map_location,
        }) %}

        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"{{ module_id }}\">
              <div class=\"map__buttons\">
                {% if page.show_map %}
                  <button type=\"button\" class=\"map__change-map js-map-btn active\">{{ __('Map', 'realtyspace') }}</button>
                {% endif %}
                {% if page.show_panorama %}
                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">{{ __('Street view', 'realtyspace') }}</button>
                {% endif %}
              </div>
              <div class=\"map__wrap\">
                {% if page.show_map %}
                  <div data-type=\"map\" class=\"map__view js-map-canvas\"></div>
                {% endif %}
                {% if page.show_panorama %}
                  <div data-type=\"panorama\" class=\"map__view map__view--panorama js-map-canvas\"></div>
                {% endif %}
              </div>
            </div>
          </div>
        </div>
      {% endif %}
      {% if page.show_agent and property.agent %}
        {% from 'macro.twig' import thumbnail %}
        {% from 'modules/agent/macro.twig' import contacts, social, photo %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            {% if property.agent.is_user %}
              <h3 class=\"widget__title\">{{ __('Contact the owner', 'realtyspace') }}</h3>
            {% else %}
              <h3 class=\"widget__title\">{{ __('Contact the Agent', 'realtyspace') }}</h3>
            {% endif %}
          </div>
          <div class=\"widget__content\">
            <div class=\"property__contact js-unhide-block\">
              <div class=\"worker worker--list worker--details\">
                <div class=\"worker__item vcard\">
                  {{ photo(property.agent, 500, 480, true) }}
                  <div class=\"worker__intro\">
                    <div class=\"worker__intro-head\">
                      <div class=\"worker__intro-name\">
                        <h3 class=\"worker__name fn\">
                          <a href=\"{{ property.agent.link }}\">{{ property.agent.name|raw }}</a></h3>
                        <div class=\"worker__post\">{{ property.agent.job_title }}</div>
                        <button type=\"button\" class=\"worker__show js-unhide\">{{ __('Contact agent', 'realtyspace') }}</button>
                      </div>
                    </div>
                    <div class=\"worker__intro-row\">
                      <div class=\"worker__intro-col\">
                        {{ contacts(property.agent) }}
                      </div>
                      <div class=\"worker__intro-col\">
                        {{ social(property.agent) }}
                      </div>
                    </div>
                  </div>
                  {% if property.agent.content %}
                    <div class=\"worker__descr\">
                      {{ property.agent.content|excerpt(150)|raw }}
                    </div>
                  {% endif %}
                  <!-- end of block .worker__descr-->
                  <div class=\"clearfix\"></div>
                </div>
                <!-- end of block .worker__item-->
              </div>
              {% if page.agent_form_id %}
                <div class=\"property__contact-form\">
                  <div class=\"form form--property-agent\">
                    {{ page.agent_form|raw }}
                  </div>
                </div>
              {% endif %}
              <div class=\"clearfix\"></div>
            </div>
          </div>
        </div>
      {% endif %}


      {% if page.show_tags_section and property.tags %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Tags', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            {% for tag in property.tags %}
              <a href=\"{{ tag.link }}\">{{ tag }}</a> {{ not loop.last ? ', ' }}
            {% endfor %}
          </div>
        </div>
      {% endif %}
    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
{% endblock %}

{% block subcontent %}
  {% if page.show_related and property.related_properties %}
    {% embed 'section-widget.twig' %}
      {% from 'modules/property/macro.twig' import items as property_items %}
      {% from 'macro.twig' import widget_header %}
      {% set widget_class='landing collapsing' %}

      {% block header %}
        {{ widget_header(__('Similar properties', 'realtyspace')) }}
      {% endblock %}

      {% block content %}
        <div class=\"listing listing--grid properties properties--grid\">
          {{ property_items(property.related_properties, 'grid') }}
        </div>
      {% endblock %}
    {% endembed %}
  {% endif %}
{% endblock %}
", "modules/property/single.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/single.twig");
    }
}
