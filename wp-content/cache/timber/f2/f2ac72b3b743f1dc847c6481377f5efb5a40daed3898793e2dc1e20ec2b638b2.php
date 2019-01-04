<?php

/* modules/property/custom-property.twig */
class __TwigTemplate_11084c83bc4044dd426b2731d057c5bbb925c3947658e0dda6800476038df23c extends Twig_Template
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
        $context["__internal_1f62457558576fbf6d211c3652ad7adcc692b06619ac98852aa2ee8017fad6f5"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/custom-property.twig", 4);
        // line 5
        $context["__internal_e00cfa14882e6ba5bdc4ba8f7db74c952842014270abc96ba6e91314876a3055"] = $this->loadTemplate("macro.twig", "modules/property/custom-property.twig", 5);
        // line 7
        $context["property"] = (isset($context["page"]) ? $context["page"] : null);
        // line 223
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
      <h1 class=\"property__title\">
        ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()), "html", null, true);
        echo "
        <span class=\"property__city\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "community", array()), "html", null, true);
        echo "</span>
      </h1>
      <div class=\"property__header\">
        <div class=\"property__price\">
          <strong class=\"properties__offer-period\">
              ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price", array()), "html", null, true);
        echo "
          </strong>
        </div>

        <div class=\"social social--properties\">
            <span class=\"social__title\">Share this:</span>
              <a href=\"https://www.facebook.com/sharer/sharer.php?display=popup&amp;redirect_uri=http%3A%2F%2Fwww.facebook.com&amp;u=";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-facebook \"></i> </a>
              <a href=\"https://twitter.com/intent/tweet?text=Property+%26+sidebar+agent&amp;url=";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-twitter \"></i> </a>
              <a href=\"https://plus.google.com/share?url=";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "set_permalinks", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-google-plus \"></i> </a>
          </div>

        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Print", "realtyspace")), "html", null, true);
        echo "</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      <div class=\"property__slider\">
        <div class=\"property__ribon\">";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
        echo "</div>
        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery slider--fixed\"  data-adaptiveHeight=\"true\">
          ";
        // line 40
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array())) {
            // line 41
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 42
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
            // line 44
            echo "          ";
        }
        // line 45
        echo "          <div class=\"slider__block\" data-slick data-wrapper>
            ";
        // line 46
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
            // line 47
            echo "              <div class=\"slider__item\">
                ";
            // line 48
            $context["href"] = $context["image"];
            // line 49
            echo "                ";
            $context["img"] = $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail_src", array(0 => $context["image"], 1 => 1170, 2 => 600), "method");
            // line 50
            echo "
                <a href=\"";
            // line 51
            echo twig_escape_filter($this->env, (isset($context["href"]) ? $context["href"] : null), "html", null, true);
            echo "\" data-index='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' data-trigger class=\"slider__img\">
                  <img data-lazy=\"";
            // line 52
            echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
            echo "/public/img/lazy-image.jpg\" alt=\"\">
                    <span class=\"slider__description\">";
            // line 53
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
            // line 57
            echo "              <div class=\"slider__item\">
                <div class=\"slider__img\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail", array(0 => null, 1 => 870, 2 => 480), "method"), "html", null, true);
            echo " </div>
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "          </div>
        </div>

          <div class=\"slider slider--thumbs js-nav-slickslider\" data-variablewidth=\"true\">
            <div class=\"slider__wrap\">
              <div class=\"slider__block\" data-slick>
                ";
        // line 67
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
            // line 68
            echo "                  <div data-slide-rel='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' class=\"slider__item slider__item--";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "\">
                    <div class=\"slider__img\">
                      <img data-lazy=\"";
            // line 70
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
        // line 74
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
      </div>
      <div class=\"property__info\">
        ";
        // line 89
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "unit_reference_no", array())) {
            // line 90
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Unit Reference No", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "unit_reference_no", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 93
        echo "        ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array())) {
            // line 94
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 97
        echo "      </div>

      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__content\">
          <div class=\"property__plan\">
            ";
        // line 102
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array())) {
            // line 103
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 109
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Area", "realtyspace")), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array()), "html", null, true);
            echo ")</dd>
                <dd class=\"property__plan-value\">";
            // line 110
            echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array()), false));
            echo "</dd>
              </dl>
            ";
        }
        // line 113
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_rooms", array())) {
            // line 114
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 120
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_rooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 124
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array())) {
            // line 125
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bathrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 131
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_bathrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 135
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array())) {
            // line 136
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bedrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 142
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 146
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "parking", array())) {
            // line 147
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 153
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "parking", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 157
        echo "          </div>
        </div>
      </div>

      ";
        // line 161
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "facilities", array())) {
            // line 162
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 164
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Amenities", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                ";
            // line 169
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "facilities", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["facility"]) {
                // line 170
                echo "                  <li>";
                echo $context["facility"];
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['facility'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 172
            echo "              </ul>
            </div>
          </div>
        </div>
      ";
        }
        // line 177
        echo "
      ";
        // line 178
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "web_remarks", array())) {
            // line 179
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 181
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Description", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">";
            // line 185
            echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "web_remarks", array());
            echo "</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">";
            // line 186
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("More information ...", "realtyspace")), "html", null, true);
            echo "</button>
            </div>
          </div>
        </div>
      ";
        }
        // line 191
        echo "
      ";
        // line 192
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "address", array())) {
            // line 193
            echo "        ";
            $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("panoramaMapSwitcher", array("showPanorama" => true, "showMap" => true, "mapType" => "roadmap", "mapZoom" => "11", "location" => array("address" => $this->getAttribute(            // line 198
(isset($context["property"]) ? $context["property"] : null), "address", array()), "lat" => $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "latitude", array()), "lng" => $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "longitude", array())))));
            // line 200
            echo "
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"";
            // line 203
            echo twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "html", null, true);
            echo "\">
              <div class=\"map__buttons\">
                  <button type=\"button\" class=\"map__change-map js-map-btn active\">";
            // line 205
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Map", "realtyspace")), "html", null, true);
            echo "</button>
                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">";
            // line 206
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
        // line 216
        echo "
    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
";
    }

    // line 225
    public function block_subcontent($context, array $blocks = array())
    {
        // line 226
        echo "  ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array())) {
            // line 227
            echo "    <div class=\"widget widget--landing widget--collapsing js-widget \">
      <div class=\"widget__header\">
        <h2 class=\"widget__title\">Similar properties</h2>
      </div>
      <div class=\"widget__content\">
        <div class=\"listing listing--grid properties properties--grid\">
          ";
            // line 233
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["related_property"]) {
                // line 234
                echo "            ";
                $context["property_boxes"] = $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "generate_boxes", array(0 => $context["related_property"]), "method");
                // line 235
                echo "            ";
                echo (isset($context["property_boxes"]) ? $context["property_boxes"] : null);
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 237
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
        return array (  543 => 237,  534 => 235,  531 => 234,  527 => 233,  519 => 227,  516 => 226,  513 => 225,  504 => 216,  491 => 206,  487 => 205,  482 => 203,  477 => 200,  475 => 198,  473 => 193,  471 => 192,  468 => 191,  460 => 186,  456 => 185,  449 => 181,  445 => 179,  443 => 178,  440 => 177,  433 => 172,  424 => 170,  420 => 169,  412 => 164,  408 => 162,  406 => 161,  400 => 157,  394 => 154,  390 => 153,  382 => 147,  379 => 146,  373 => 143,  369 => 142,  361 => 136,  358 => 135,  352 => 132,  348 => 131,  340 => 125,  337 => 124,  331 => 121,  327 => 120,  319 => 114,  316 => 113,  310 => 110,  304 => 109,  296 => 103,  294 => 102,  287 => 97,  278 => 94,  275 => 93,  266 => 90,  264 => 89,  247 => 74,  225 => 70,  217 => 68,  200 => 67,  192 => 61,  183 => 58,  180 => 57,  163 => 53,  157 => 52,  151 => 51,  148 => 50,  145 => 49,  143 => 48,  140 => 47,  122 => 46,  119 => 45,  116 => 44,  105 => 42,  100 => 41,  98 => 40,  93 => 38,  84 => 32,  77 => 28,  73 => 27,  69 => 26,  60 => 20,  52 => 15,  48 => 14,  41 => 9,  38 => 8,  34 => 3,  32 => 223,  30 => 7,  28 => 5,  26 => 4,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/custom-property.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/custom-property.twig");
    }
}
