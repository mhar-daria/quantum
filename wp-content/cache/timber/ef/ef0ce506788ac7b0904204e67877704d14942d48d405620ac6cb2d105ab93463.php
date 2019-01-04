<?php

/* modules/property/custom-property.twig */
class __TwigTemplate_cfb662cd9282fdc468a8e0156bb22bc9d1e8501056aae3b746f8a7fa3f6a182c extends Twig_Template
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
        $context["__internal_b249cd4763909c2c040fa8dd4f055c87b3143b07f5f833f4967f8a75d3463495"] = $this->loadTemplate("modules/property/macro.twig", "modules/property/custom-property.twig", 4);
        // line 5
        $context["__internal_15f694ad87d79d12689bfed5073bbef5de705a49b3935069c51a8aa0846d68c8"] = $this->loadTemplate("macro.twig", "modules/property/custom-property.twig", 5);
        // line 7
        $context["property"] = (isset($context["page"]) ? $context["page"] : null);
        // line 221
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "address", array()), "html", null, true);
        echo "</span>
      </h1>
      <div class=\"property__header\">
        <div class=\"property__price\">
          ";
        // line 19
        echo $context["__internal_b249cd4763909c2c040fa8dd4f055c87b3143b07f5f833f4967f8a75d3463495"]->getprice($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price", array()), true);
        echo "
        </div>

        <div class=\"social social--properties\">
            <span class=\"social__title\">Share this:</span>
              <a href=\"https://www.facebook.com/sharer/sharer.php?display=popup&amp;redirect_uri=http%3A%2F%2Fwww.facebook.com&amp;u=http%3A%2F%2Fquantum.local%3A7888%2Fproperties%2Fproperty-sidebar-agent%2F%3Fq%3D%252Fproperties%252Fproperty-sidebar-agent%252F&amp;t=Property+%26+sidebar+agent\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-facebook \"></i> </a>
              <a href=\"https://twitter.com/intent/tweet?text=Property+%26+sidebar+agent&amp;url=http%3A%2F%2Fquantum.local%3A7888%2Fproperties%2Fproperty-sidebar-agent%2F%3Fq%3D%252Fproperties%252Fproperty-sidebar-agent%252F\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-twitter \"></i> </a>
              <a href=\"https://plus.google.com/share?url=http%3A%2F%2Fquantum.local%3A7888%2Fproperties%2Fproperty-sidebar-agent%2F%3Fq%3D%252Fproperties%252Fproperty-sidebar-agent%252F\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-google-plus \"></i> </a>
          </div>

        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>";
        // line 30
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Print", "realtyspace")), "html", null, true);
        echo "</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      <div class=\"property__slider\">
        <div class=\"property__ribon\">";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
        echo "</div>
        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery slider--fixed\"  data-adaptiveHeight=\"true\">
          ";
        // line 38
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array())) {
            // line 39
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "images", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 40
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
            // line 42
            echo "          ";
        }
        // line 43
        echo "          <div class=\"slider__block\" data-slick data-wrapper>
            ";
        // line 44
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
            // line 45
            echo "              <div class=\"slider__item\">
                ";
            // line 46
            $context["href"] = $context["image"];
            // line 47
            echo "                ";
            $context["img"] = $context["image"];
            // line 48
            echo "
                <a href=\"";
            // line 49
            echo twig_escape_filter($this->env, (isset($context["href"]) ? $context["href"] : null), "html", null, true);
            echo "\" data-index='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' data-trigger class=\"slider__img\">
                  <img data-lazy=\"";
            // line 50
            echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_template_directory_uri")), "html", null, true);
            echo "/public/img/lazy-image.jpg\" alt=\"\">
                    <span class=\"slider__description\">";
            // line 51
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
            // line 55
            echo "              <div class=\"slider__item\">
                <div class=\"slider__img\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "thumbnail", array(0 => null, 1 => 870, 2 => 480), "method"), "html", null, true);
            echo " </div>
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "          </div>
        </div>

          <div class=\"slider slider--thumbs js-nav-slickslider\" data-variablewidth=\"true\">
            <div class=\"slider__wrap\">
              <div class=\"slider__block\" data-slick>
                ";
        // line 65
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
            // line 66
            echo "                  <div data-slide-rel='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "' class=\"slider__item slider__item--";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "\">
                    <div class=\"slider__img\">
                      <img data-lazy=\"";
            // line 68
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
        // line 72
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
        // line 87
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "unit_reference_no", array())) {
            // line 88
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Unit Reference No", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "unit_reference_no", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 91
        echo "        ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array())) {
            // line 92
            echo "          <div class=\"property__info-item\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type", "realtyspace")), "html", null, true);
            echo ":<strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 95
        echo "      </div>

      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__content\">
          <div class=\"property__plan\">
            ";
        // line 100
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array())) {
            // line 101
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 107
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Area", "realtyspace")), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array()), "html", null, true);
            echo ")</dd>
                <dd class=\"property__plan-value\">";
            // line 108
            echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "plot_area", array()), false));
            echo "</dd>
              </dl>
            ";
        }
        // line 111
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_rooms", array())) {
            // line 112
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 118
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 119
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_rooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 122
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array())) {
            // line 123
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bathrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 129
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "no_of_bathrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 133
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array())) {
            // line 134
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-bedrooms\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 140
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 144
        echo "            ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "parking", array())) {
            // line 145
            echo "              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">";
            // line 151
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
            echo "</dd>
                <dd class=\"property__plan-value\">";
            // line 152
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "parking", array()), "html", null, true);
            echo "</dd>
              </dl>
            ";
        }
        // line 155
        echo "          </div>
        </div>
      </div>

      ";
        // line 159
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "facilities", array())) {
            // line 160
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 162
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Amenities", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                ";
            // line 167
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "facilities", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["facility"]) {
                // line 168
                echo "                  <li>";
                echo $context["facility"];
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['facility'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            echo "              </ul>
            </div>
          </div>
        </div>
      ";
        }
        // line 175
        echo "
      ";
        // line 176
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "web_remarks", array())) {
            // line 177
            echo "        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">";
            // line 179
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Description", "realtyspace")), "html", null, true);
            echo "</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">";
            // line 183
            echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "web_remarks", array());
            echo "</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">";
            // line 184
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("More information ...", "realtyspace")), "html", null, true);
            echo "</button>
            </div>
          </div>
        </div>
      ";
        }
        // line 189
        echo "
      ";
        // line 190
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "address", array())) {
            // line 191
            echo "        ";
            $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("panoramaMapSwitcher", array("showPanorama" => true, "showMap" => true, "mapType" => "roadmap", "mapZoom" => "11", "location" => array("address" => $this->getAttribute(            // line 196
(isset($context["property"]) ? $context["property"] : null), "address", array()), "lat" => $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "latitude", array()), "lng" => $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "longitude", array())))));
            // line 198
            echo "
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"";
            // line 201
            echo twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "html", null, true);
            echo "\">
              <div class=\"map__buttons\">
                  <button type=\"button\" class=\"map__change-map js-map-btn active\">";
            // line 203
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Map", "realtyspace")), "html", null, true);
            echo "</button>
                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">";
            // line 204
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
        // line 214
        echo "
    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
";
    }

    // line 223
    public function block_subcontent($context, array $blocks = array())
    {
        // line 224
        echo "  ";
        if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array())) {
            // line 225
            echo "    <div class=\"widget widget--landing widget--collapsing js-widget \">
      <div class=\"widget__header\">
        <h2 class=\"widget__title\">Similar properties</h2>
      </div>
      <div class=\"widget__content\">
        <div class=\"listing listing--grid properties properties--grid\">
          ";
            // line 231
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "related_properties", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["related_property"]) {
                // line 232
                echo "            ";
                $context["property_boxes"] = $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "generate_boxes", array(0 => $context["related_property"]), "method");
                // line 233
                echo "            ";
                echo (isset($context["property_boxes"]) ? $context["property_boxes"] : null);
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 235
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
        return array (  532 => 235,  523 => 233,  520 => 232,  516 => 231,  508 => 225,  505 => 224,  502 => 223,  493 => 214,  480 => 204,  476 => 203,  471 => 201,  466 => 198,  464 => 196,  462 => 191,  460 => 190,  457 => 189,  449 => 184,  445 => 183,  438 => 179,  434 => 177,  432 => 176,  429 => 175,  422 => 170,  413 => 168,  409 => 167,  401 => 162,  397 => 160,  395 => 159,  389 => 155,  383 => 152,  379 => 151,  371 => 145,  368 => 144,  362 => 141,  358 => 140,  350 => 134,  347 => 133,  341 => 130,  337 => 129,  329 => 123,  326 => 122,  320 => 119,  316 => 118,  308 => 112,  305 => 111,  299 => 108,  293 => 107,  285 => 101,  283 => 100,  276 => 95,  267 => 92,  264 => 91,  255 => 88,  253 => 87,  236 => 72,  214 => 68,  206 => 66,  189 => 65,  181 => 59,  172 => 56,  169 => 55,  152 => 51,  146 => 50,  140 => 49,  137 => 48,  134 => 47,  132 => 46,  129 => 45,  111 => 44,  108 => 43,  105 => 42,  94 => 40,  89 => 39,  87 => 38,  82 => 36,  73 => 30,  59 => 19,  52 => 15,  48 => 14,  41 => 9,  38 => 8,  34 => 3,  32 => 221,  30 => 7,  28 => 5,  26 => 4,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var page \\cf47\\theme\\realtyspace\\module\\property\\viewmodel\\CustomPropertyModel #}

{% extends 'custom-base-archive.twig' %}
{% from 'modules/property/macro.twig' import price %}
{% from 'macro.twig' import widget_header %}

{% set property = page %}
{% block content %}

  <div class=\"site site--main\">
    <!-- BEGIN PROPERTY DETAILS-->
    <div class=\"property\">
      <h1 class=\"property__title\">
        {{ property.title }}
        <span class=\"property__city\">{{ property.address }}</span>
      </h1>
      <div class=\"property__header\">
        <div class=\"property__price\">
          {{ price(property.price, true) }}
        </div>

        <div class=\"social social--properties\">
            <span class=\"social__title\">Share this:</span>
              <a href=\"https://www.facebook.com/sharer/sharer.php?display=popup&amp;redirect_uri=http%3A%2F%2Fwww.facebook.com&amp;u=http%3A%2F%2Fquantum.local%3A7888%2Fproperties%2Fproperty-sidebar-agent%2F%3Fq%3D%252Fproperties%252Fproperty-sidebar-agent%252F&amp;t=Property+%26+sidebar+agent\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-facebook \"></i> </a>
              <a href=\"https://twitter.com/intent/tweet?text=Property+%26+sidebar+agent&amp;url=http%3A%2F%2Fquantum.local%3A7888%2Fproperties%2Fproperty-sidebar-agent%2F%3Fq%3D%252Fproperties%252Fproperty-sidebar-agent%252F\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-twitter \"></i> </a>
              <a href=\"https://plus.google.com/share?url=http%3A%2F%2Fquantum.local%3A7888%2Fproperties%2Fproperty-sidebar-agent%2F%3Fq%3D%252Fproperties%252Fproperty-sidebar-agent%252F\" target=\"_blank\" class=\"social__item\"> <i class=\"fa fa-google-plus \"></i> </a>
          </div>

        <div class=\"property__actions\">
          <button type=\"button\" class=\"btn--default property__actions--print\" onclick=\"window.print()\"><i class=\"fa fa-print\"></i>{{ __('Print', 'realtyspace') }}</button>
        </div>
      </div>

      <div class=\"clearfix\"></div>
      <div class=\"property__slider\">
        <div class=\"property__ribon\">{{ property.type }}</div>
        <div class=\"slider slider--small js-dapi-slickslider  js-dapi-gallery slider--fixed\"  data-adaptiveHeight=\"true\">
          {% if property.images %}
            {% for image in property.images %}
                <div data-size=\"0x0\" data-caption=\"{{ property.title }}\" data-item data-src=\"{{ image }}\"></div>
            {% endfor %}
          {% endif %}
          <div class=\"slider__block\" data-slick data-wrapper>
            {% for image in property.images %}
              <div class=\"slider__item\">
                {% set href=image %}
                {% set img=image %}

                <a href=\"{{ href }}\" data-index='{{ loop.index0 }}' data-trigger class=\"slider__img\">
                  <img data-lazy=\"{{ img }}\" src=\"{{ fn('get_template_directory_uri') }}/public/img/lazy-image.jpg\" alt=\"\">
                    <span class=\"slider__description\">{{ property.title }}</span>
                </a>
              </div>
            {% else %}
              <div class=\"slider__item\">
                <div class=\"slider__img\">{{ macro.thumbnail(null, 870, 480) }} </div>
              </div>
            {% endfor %}
          </div>
        </div>

          <div class=\"slider slider--thumbs js-nav-slickslider\" data-variablewidth=\"true\">
            <div class=\"slider__wrap\">
              <div class=\"slider__block\" data-slick>
                {% for image in property.images %}
                  <div data-slide-rel='{{ loop.index0 }}' class=\"slider__item slider__item--{{ loop.index0 }}\">
                    <div class=\"slider__img\">
                      <img data-lazy=\"{{ macro.thumbnail_src(image, 270, 0) }}\" src=\"{{ image }}\" alt=\"{{ property.title }}\">
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
      </div>
      <div class=\"property__info\">
        {% if property.unit_reference_no %}
          <div class=\"property__info-item\">{{ __('Unit Reference No', 'realtyspace') }}:<strong> {{ property.unit_reference_no }}</strong>
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
            {% if property.plot_area %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-area\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Area', 'realtyspace') }} ({{ property.plot_area }})</dd>
                <dd class=\"property__plan-value\">{{ property.plot_area|area(false) }}</dd>
              </dl>
            {% endif %}
            {% if property.no_of_rooms %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-window\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Rooms', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.no_of_rooms }}</dd>
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
                <dd class=\"property__plan-value\">{{ property.no_of_bathrooms }}</dd>
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
            {% if property.parking %}
              <dl class=\"property__plan-item\">
                <dt class=\"property__plan-icon\">
                  <svg>
                    <use xlink:href=\"#icon-garage\"></use>
                  </svg>
                </dt>
                <dd class=\"property__plan-title\">{{ __('Garages', 'realtyspace') }}</dd>
                <dd class=\"property__plan-value\">{{ property.parking }}</dd>
              </dl>
            {% endif %}
          </div>
        </div>
      </div>

      {% if property.facilities %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Amenities', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__params\">
              <ul class=\"property__params-list property__params-list--options\">
                {% for facility in property.facilities %}
                  <li>{{ facility|raw }}</li>
                {% endfor %}
              </ul>
            </div>
          </div>
        </div>
      {% endif %}

      {% if property.web_remarks %}
        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__header\">
            <h3 class=\"widget__title\">{{ __('Description', 'realtyspace') }}</h3>
          </div>
          <div class=\"widget__content\">
            <div class=\"property__description js-unhide-block\">
              <div class=\"property__description-wrap1\">{{ property.web_remarks|raw }}</div>
              <button type=\"button\" class=\"property__btn-more js-unhide\">{{ __('More information ...', 'realtyspace') }}</button>
            </div>
          </div>
        </div>
      {% endif %}

      {% if property.address %}
        {% set module_id = js_module('panoramaMapSwitcher',{
        'showPanorama': true,
        'showMap': true,
        'mapType': 'roadmap',
        'mapZoom': '11',
        'location': {'address': property.address, 'lat': property.latitude, 'lng': property.longitude}
        }) %}

        <div class=\"widget js-widget widget--details\">
          <div class=\"widget__content\">
            <div class=\"map map--properties\" id=\"{{ module_id }}\">
              <div class=\"map__buttons\">
                  <button type=\"button\" class=\"map__change-map js-map-btn active\">{{ __('Map', 'realtyspace') }}</button>
                  <button type=\"button\" class=\"map__change-panorama js-panorama-btn\">{{ __('Street view', 'realtyspace') }}</button>
              </div>
              <div class=\"map__wrap\">
                  <div data-type=\"map\" class=\"map__view js-map-canvas\"></div>
                  <div data-type=\"panorama\" class=\"map__view map__view--panorama js-map-canvas\"></div>
              </div>
            </div>
          </div>
        </div>
      {% endif %}

    </div>
  </div>
  <!-- end of block .property-->
  <!-- END PROPERTY DETAILS-->
{% endblock %}

{% set related_property = property.related_properties %}

{% block subcontent %}
  {% if property.related_properties %}
    <div class=\"widget widget--landing widget--collapsing js-widget \">
      <div class=\"widget__header\">
        <h2 class=\"widget__title\">Similar properties</h2>
      </div>
      <div class=\"widget__content\">
        <div class=\"listing listing--grid properties properties--grid\">
          {% for related_property in property.related_properties %}
            {% set property_boxes = property.generate_boxes(related_property) %}
            {{ property_boxes|raw }}
          {% endfor %}
        </div>
      </div>
    </div>
  {% endif %}
{% endblock %}
", "modules/property/custom-property.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/custom-property.twig");
    }
}
