<?php

/* modules/property/custom-property.twig */
class __TwigTemplate_3efb5aff12c126735fcd8a9f0b1422c0198d31a467c94057b3aaaedc54822eed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("custom-base-archive.twig", "modules/property/custom-property.twig", 3);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'subcontent' => array($this, 'block_subcontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "custom-base-archive.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        $context["__internal_f3f9dcaed5859d211570e50c225549edd51fe9f69c9dbea0ccdd55abff01347e"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/custom-property.twig", 4);
        // line 5
        $context["__internal_d072512f19609d9c847d3465d85c9e3fc0d775db6148fc1f392d98595aae1805"] = $this->loadTemplate("macro.twig", "modules/property/custom-property.twig", 5);
        // line 7
        $context["property"] = (isset($context["page"]) ? $context["page"] : null);
        // line 228
        $context["related_property"] = $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array());
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "
  <div class=\"site site--main\">
    <!-- BEGIN PROPERTY DETAILS-->
    <div class=\"property\">

      <div class=\"property__slider\">
        <div class=\"property__ribon\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
        echo "</div>
        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery slider--fixed\"  data-adaptiveHeight=\"true\">
          ";
        // line 17
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array())) {
            // line 18
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 19
                echo "                <div data-size=\"0x0\" data-caption=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
                echo "\" data-item data-src=\"";
                echo twig_escape_filter($this->env, $context["image"], "html", null, true);
                echo "\"></div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "          ";
        }
        // line 22
        echo "          <div class=\"slider__block\" data-slick data-wrapper>
            ";
        // line 23
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
            // line 24
            echo "              <div class=\"slider__item\">
                ";
            // line 25
            $context["href"] = $context["image"];
            // line 26
            echo "                ";
            $context["img"] = $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $context["image"], 1 => 1170, 2 => 600), "method");
            // line 27
            echo "
                <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["href"]) ? $context["href"] : null), "html", null, true);
            echo "\" data-index='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' data-trigger class=\"slider__img\">
                  <img data-lazy=\"";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
            echo "/public/img/lazy-image.jpg\" alt=\"\">
                    <span class=\"slider__description\">";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
            echo "</span>
                </a>
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
            // line 34
            echo "              <div class=\"slider__item\">
                <div class=\"slider__img\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail", array(0 => null, 1 => 870, 2 => 480), "method"), "html", null, true);
            echo " </div>
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "          </div>
        </div>

        <div class=\"slider slider--thumbs js-nav-slickslider\" data-variablewidth=\"true\">
          <div class=\"slider__wrap\">
            <div class=\"slider__block\" data-slick>
              ";
        // line 44
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
            // line 45
            echo "                <div data-slide-rel='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' class=\"slider__item slider__item--";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "\">
                  <div class=\"slider__img\">
                    <img data-lazy=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $context["image"], 1 => 270, 2 => 0), "method"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $context["image"], "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
            echo "\">
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
        // line 51
        echo "            </div>
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
      </div>

      <div class=\"clearfix\"></div>

      <h1 class=\"property__title\">
        ";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
        echo "
        <span class=\"property__city\">";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "community", array()), "html", null, true);
        echo "</span>
      </h1>
      <div class=\"property__header\">
        <div class=\"property__price\">
          <strong class=\"properties__offer-period\">
              ";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price", array()), "html", null, true);
        echo "
          </strong>
        </div>

        <div class=\"social social--properties\">
            <span class=\"social__title\">Share this:</span>
              <a href=\"https://www.facebook.com/sharer/sharer.php?display=popup&amp;redirect_uri=http%3A%2F%2Fwww.facebook.com&amp;u=";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-facebook \"></i> </a>
              <a href=\"https://twitter.com/intent/tweet?text=Property+%26+sidebar+agent&amp;url=";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-twitter \"></i> </a>
              <a href=\"https://plus.google.com/share?url=";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-google-plus \"></i> </a>
          </div>

        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>";
        // line 87
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Print", "realtyspace")), "html", null, true);
        echo "</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      
      <div class=\"property__info\">
        ";
        // line 94
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "unit_reference_no", array())) {
            // line 95
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Unit Reference No", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "unit_reference_no", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 98
        echo "        ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array())) {
            // line 99
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 102
        echo "      </div>

      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__content\">
          <div class=\"property__plan\">
            ";
        // line 107
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array())) {
            // line 108
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 114
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Area", "realtyspace")), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array()), "html", null, true);
            echo ")</dd>
                <dd class=\"property__plan-value\">";
            // line 115
            echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array()), false));
            echo "</dd>
              </dl>
            ";
        }
        // line 118
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_rooms", array())) {
            // line 119
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 125
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_rooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 129
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array())) {
            // line 130
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bathrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 136
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 137
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_bathrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 140
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array())) {
            // line 141
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bedrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 147
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 151
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "parking", array())) {
            // line 152
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 158
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "parking", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 162
        echo "          </div>
        </div>
      </div>

      ";
        // line 166
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "facilities", array())) {
            // line 167
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 169
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Amenities", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                ";
            // line 174
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "facilities", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["facility"]) {
                // line 175
                echo "                  <li>";
                echo $context["facility"];
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['facility'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 177
            echo "              </ul>
            </div>
          </div>
        </div>
      ";
        }
        // line 182
        echo "
      ";
        // line 183
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "web_remarks", array())) {
            // line 184
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 186
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Description", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">";
            // line 190
            echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "web_remarks", array());
            echo "</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">";
            // line 191
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("More information ...", "realtyspace")), "html", null, true);
            echo "</button>
            </div>
          </div>
        </div>
      ";
        }
        // line 196
        echo "
      ";
        // line 197
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "address", array())) {
            // line 198
            echo "        ";
            $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("panoramaMapSwitcher", array("showPanorama" => true, "showMap" => true, "mapType" => "roadmap", "mapZoom" => "11", "location" => array("address" => $this->getAttribute(            // line 203
(isset($context["property"]) ? $context["property"] : null), "address", array()), "lat" => $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "latitude", array()), "lng" => $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "longitude", array())))));
            // line 205
            echo "
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"";
            // line 208
            echo twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "html", null, true);
            echo "\">
              <div class=\"map__buttons\">
                  <button type=\"button\" class=\"map__change-map js-map-btn active\">";
            // line 210
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Map", "realtyspace")), "html", null, true);
            echo "</button>
                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">";
            // line 211
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Street view", "realtyspace")), "html", null, true);
            echo "</button>
              </div>
              <div class=\"map__wrap\">
                  <div data-type=\"map\" class=\"map__view js-map-canvas\"></div>
                  <div data-type=\"panorama\" class=\"map__view map__view--panorama js-map-canvas\"></div>
              </div>
            </div>
          </div>
        </div>
      ";
        }
        // line 221
        echo "
    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
";
    }

    // line 230
    public function block_subcontent($context, array $blocks = array())
    {
        // line 231
        echo "  ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array())) {
            // line 232
            echo "    <div class=\"widget widget--landing widget--collapsing js-widget \">
      <div class=\"widget__header\">
        <h2 class=\"widget__title\">Similar properties</h2>
      </div>
      <div class=\"widget__content\">
        <div class=\"listing listing--grid properties properties--grid\">
          ";
            // line 238
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["related_property"]) {
                // line 239
                echo "            ";
                $context["property_boxes"] = $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "generate_boxes", array(0 => $context["related_property"]), "method");
                // line 240
                echo "            ";
                echo (isset($context["property_boxes"]) ? $context["property_boxes"] : null);
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 242
            echo "        </div>
      </div>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "modules/property/custom-property.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  548 => 242,  539 => 240,  536 => 239,  532 => 238,  524 => 232,  521 => 231,  518 => 230,  509 => 221,  496 => 211,  492 => 210,  487 => 208,  482 => 205,  480 => 203,  478 => 198,  476 => 197,  473 => 196,  465 => 191,  461 => 190,  454 => 186,  450 => 184,  448 => 183,  445 => 182,  438 => 177,  429 => 175,  425 => 174,  417 => 169,  413 => 167,  411 => 166,  405 => 162,  399 => 159,  395 => 158,  387 => 152,  384 => 151,  378 => 148,  374 => 147,  366 => 141,  363 => 140,  357 => 137,  353 => 136,  345 => 130,  342 => 129,  336 => 126,  332 => 125,  324 => 119,  321 => 118,  315 => 115,  309 => 114,  301 => 108,  299 => 107,  292 => 102,  283 => 99,  280 => 98,  271 => 95,  269 => 94,  259 => 87,  252 => 83,  248 => 82,  244 => 81,  235 => 75,  227 => 70,  223 => 69,  203 => 51,  181 => 47,  173 => 45,  156 => 44,  148 => 38,  139 => 35,  136 => 34,  119 => 30,  113 => 29,  107 => 28,  104 => 27,  101 => 26,  99 => 25,  96 => 24,  78 => 23,  75 => 22,  72 => 21,  61 => 19,  56 => 18,  54 => 17,  49 => 15,  41 => 9,  38 => 8,  34 => 3,  32 => 228,  30 => 7,  28 => 5,  26 => 4,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/custom-property.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/property/custom-property.twig");
    }
}
