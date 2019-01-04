<?php

/* modules/property/macro.twig */
class __TwigTemplate_948e852dd2c206b07a0ebb708c7935b4c09b6a052972e9530dd3f693804d1627 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 9
        echo "
";
        // line 47
        echo "

";
        // line 95
        echo "

";
        // line 127
        echo "
";
        // line 224
        echo "
";
        // line 245
        echo "


";
        // line 264
        echo "
";
        // line 270
        echo "
";
        // line 293
        echo "


";
        // line 324
        echo "
";
        // line 340
        echo "
";
        // line 379
        echo "
";
        // line 411
        echo "

";
    }

    // line 3
    public function getlisting($__results__ = null, $__mode__ = null, $__submode__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "results" => $__results__,
            "mode" => $__mode__,
            "submode" => $__submode__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 4
            echo "  ";
            $context["__internal_67d967ca722f8d7d937d8cf8dc3c89d40220c2d8ca55f4a50111672e4d1baf10"] = $this;
            // line 5
            echo "  <div class=\"listing listing--";
            echo twig_escape_filter($this->env, (isset($context["mode"]) ? $context["mode"] : null), "html", null, true);
            echo " ";
            if ((isset($context["submode"]) ? $context["submode"] : null)) {
                echo " listing--";
                echo twig_escape_filter($this->env, (isset($context["submode"]) ? $context["submode"] : null), "html", null, true);
            }
            echo " properties properties--";
            echo twig_escape_filter($this->env, (isset($context["mode"]) ? $context["mode"] : null), "html", null, true);
            echo "\">
    ";
            // line 6
            echo $context["__internal_67d967ca722f8d7d937d8cf8dc3c89d40220c2d8ca55f4a50111672e4d1baf10"]->getitems((isset($context["results"]) ? $context["results"] : null), (isset($context["mode"]) ? $context["mode"] : null));
            echo "
  </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 10
    public function getgrid_item($__property__ = null, $__options__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "options" => $__options__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 11
            echo "  ";
            $context["__internal_b4d6f97a0fa16b9299be8a748d8c258c02615e42b4152b351c90a2f2025cf6e6"] = $this;
            // line 12
            echo "
  ";
            // line 13
            $context["options"] = twig_array_merge(array("gallery_mode" => false, "hover_params" => true, "hover_btn" => false, "index" => null), ((            // line 18
array_key_exists("options", $context)) ? (_twig_default_filter((isset($context["options"]) ? $context["options"] : null), array())) : (array())));
            // line 19
            echo "
  <div class=\"listing__item\">
    <div class=\"properties__item\"
        ";
            // line 22
            if ($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "gallery_mode", array())) {
                // line 23
                echo "          data-item data-size=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array()), "width", array()), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array()), "height", array()), "html", null, true);
                echo "\"
          data-src=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array()), "src", array()), "html", null, true);
                echo "\"
        ";
            }
            // line 26
            echo "    >
      ";
            // line 27
            echo $context["__internal_b4d6f97a0fa16b9299be8a748d8c258c02615e42b4152b351c90a2f2025cf6e6"]->getthumbnail((isset($context["property"]) ? $context["property"] : null), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "hover_params", array()), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "hover_btn", array()), true, true, $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "gallery_mode", array()), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "index", array()));
            echo "
      <!-- end of block .properties__thumb-->
      <div class=\"properties__info\">
        ";
            // line 30
            echo $context["__internal_b4d6f97a0fa16b9299be8a748d8c258c02615e42b4152b351c90a2f2025cf6e6"]->getaddress_link((isset($context["property"]) ? $context["property"] : null));
            echo "
        <!-- end of block .properties__param-->
        <hr class=\"divider--dotted properties__divider\">
        <div class=\"properties__offer\">
          <div class=\"properties__offer-column\">
            <div class=\"properties__offer-value\">
              ";
            // line 36
            echo $context["__internal_b4d6f97a0fa16b9299be8a748d8c258c02615e42b4152b351c90a2f2025cf6e6"]->getprice((isset($context["property"]) ? $context["property"] : null), true);
            echo "
            </div>
          </div>
        </div>
      </div>
      <!-- end of block .properties__info-->
    </div>

    <!-- end of block .properties__item-->
  </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 49
    public function getlist_item($__property__ = null, $__options__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "options" => $__options__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 50
            echo "  ";
            $context["macro"] = $this->loadTemplate("macro.twig", "modules/property/macro.twig", 50);
            // line 51
            echo "  ";
            $context["__internal_09f408e3e7925731c7d95b4392d250665fa0d5766a6dcd9965dc7f66c2b3b8fa"] = $this;
            // line 52
            echo "
  ";
            // line 53
            $context["options"] = twig_array_merge(array(), ((            // line 54
array_key_exists("options", $context)) ? (_twig_default_filter((isset($context["options"]) ? $context["options"] : null), array())) : (array())));
            // line 55
            echo "
  <div class=\"listing__item\">
    <div class=\"properties__item\">
      ";
            // line 58
            echo $context["__internal_09f408e3e7925731c7d95b4392d250665fa0d5766a6dcd9965dc7f66c2b3b8fa"]->getthumbnail((isset($context["property"]) ? $context["property"] : null), true, false, true, true, false);
            echo "
      <!-- end of block .properties__thumb-->
      <div class=\"properties__details\">
        <div class=\"properties__info\">
          ";
            // line 62
            echo $context["__internal_09f408e3e7925731c7d95b4392d250665fa0d5766a6dcd9965dc7f66c2b3b8fa"]->getaddress_link((isset($context["property"]) ? $context["property"] : null));
            echo "

          <div class=\"properties__offer\">
            <div class=\"properties__offer-column\">
              <div class=\"properties__offer-value\">
                ";
            // line 67
            echo $context["__internal_09f408e3e7925731c7d95b4392d250665fa0d5766a6dcd9965dc7f66c2b3b8fa"]->getprice((isset($context["property"]) ? $context["property"] : null), true);
            echo "
              </div>
            </div>
          </div>
          <hr class=\"divider--dotted properties__divider\">

          <div class=\"properties__params--mob\">
            <a href=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "link", array()), "html", null, true);
            echo "\" class=\"properties__more\">
              ";
            // line 75
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("View details", "realtyspace")), "html", null, true);
            echo "
            </a>
            <span class=\"properties__params\">";
            // line 77
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Built-Up", "realtyspace")), "html", null, true);
            echo " - ";
            echo _twig_default_filter(call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array()))), "-");
            echo "</span>
            <span class=\"properties__params\">";
            // line 78
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Land Size", "realtyspace")), "html", null, true);
            echo " - ";
            echo _twig_default_filter(call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array()))), "-");
            echo "</span>
          </div>
        </div>

        <div class=\"properties__intro\">
          <p>";
            // line 83
            echo (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "excerpt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "excerpt", array()), wp_trim_words($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "content", array()), 100))) : (wp_trim_words($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "content", array()), 100)));
            echo "</p>
        </div>

        <a href=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "link", array()), "html", null, true);
            echo "\" class=\"properties__more\">
          ";
            // line 87
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("View details", "realtyspace")), "html", null, true);
            echo "
        </a>
      </div>
      <!-- end of block .properties__info-->
    </div>
  </div>
  <!-- end of block .properties__item-->
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 97
    public function getthumbnail($__property__ = null, $__show_params__ = null, $__show_imagebtn__ = null, $__show_ribbon__ = true, $__show_link__ = true, $__gallery_mode__ = false, $__gallery_index__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "show_params" => $__show_params__,
            "show_imagebtn" => $__show_imagebtn__,
            "show_ribbon" => $__show_ribbon__,
            "show_link" => $__show_link__,
            "gallery_mode" => $__gallery_mode__,
            "gallery_index" => $__gallery_index__,
            "varargs" => func_num_args() > 7 ? array_slice(func_get_args(), 7) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 98
            echo "  ";
            // line 99
            echo "  ";
            $context["__internal_1d727056a40a5576888069ccf013092711dbcc2084fc1bd75c5bda7689cc325f"] = $this;
            // line 100
            echo "  ";
            $context["__internal_1a547aafc83fefcc1d653a8764b2b3f452d280792ef7f73e0473f0208299f027"] = $this->loadTemplate("macro.twig", "modules/property/macro.twig", 100);
            // line 101
            echo "  <div class=\"properties__thumb\">
    ";
            // line 102
            ob_start();
            // line 103
            echo "      ";
            echo $context["__internal_1a547aafc83fefcc1d653a8764b2b3f452d280792ef7f73e0473f0208299f027"]->getthumbnail($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array()), "src", array()), 554, 360, null, (isset($context["gallery_mode"]) ? $context["gallery_mode"] : null), (($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array(), "any", false, true), "alt", array()), $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()))) : ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()))));
            echo "
      ";
            // line 104
            if ((isset($context["show_params"]) ? $context["show_params"] : null)) {
                // line 105
                echo "        ";
                echo $context["__internal_1d727056a40a5576888069ccf013092711dbcc2084fc1bd75c5bda7689cc325f"]->gethover_params((isset($context["property"]) ? $context["property"] : null));
                echo "
      ";
            }
            // line 107
            echo "      ";
            if ((isset($context["show_imagebtn"]) ? $context["show_imagebtn"] : null)) {
                // line 108
                echo "        <figure class=\"item-photo__hover\">
          <span class=\"item-photo__more\">";
                // line 109
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("View", "realtyspace")), "html", null, true);
                echo "</span>
        </figure>
      ";
            }
            // line 112
            echo "    ";
            $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 113
            echo "    ";
            if ((isset($context["show_link"]) ? $context["show_link"] : null)) {
                // line 114
                echo "      <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "link", array()), "html", null, true);
                echo "\" class=\"item-photo\" ";
                if ((isset($context["gallery_mode"]) ? $context["gallery_mode"] : null)) {
                    echo " data-index=";
                    echo twig_escape_filter($this->env, (isset($context["gallery_index"]) ? $context["gallery_index"] : null), "html", null, true);
                    echo " data-trigger";
                }
                echo ">
        ";
                // line 115
                echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
                echo "
      </a>
    ";
            } else {
                // line 118
                echo "      <div class=\"item-photo\">
        ";
                // line 119
                echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 122
            echo "    ";
            if ((isset($context["show_ribbon"]) ? $context["show_ribbon"] : null)) {
                // line 123
                echo "      ";
                echo $context["__internal_1d727056a40a5576888069ccf013092711dbcc2084fc1bd75c5bda7689cc325f"]->getribbon((isset($context["property"]) ? $context["property"] : null));
                echo "
    ";
            }
            // line 125
            echo "  </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 128
    public function gethover_params($__property__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 129
            echo "  ";
            // line 130
            echo "  ";
            if (($this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_style", array()) == "minimal")) {
                // line 131
                echo "    <figure class=\"item-photo__hover item-photo__hover--params  item-photo__hover--params-columns\">
      ";
                // line 132
                if ((twig_in_filter("type", $this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_fields", array())) && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()))) {
                    // line 133
                    echo "        <span class=\"properties__param-type\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
                    echo "</span>
      ";
                }
                // line 135
                echo "
      <span class=\"properties__param\">
        ";
                // line 137
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_fields", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 138
                    echo "          ";
                    if ((($context["field"] == "rooms") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array()))) {
                        // line 139
                        echo "            <span class=\"properties__param-column\">
                    <span class=\"properties__param-label\">";
                        // line 140
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
                        echo ":</span>
                    <span class=\"properties__param-value\">";
                        // line 141
                        echo (($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array()), "-")) : ("-"));
                        echo "</span>
                </span>
          ";
                    } elseif (((                    // line 143
$context["field"] == "bathrooms") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array()))) {
                        // line 144
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 145
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 146
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array());
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 148
$context["field"] == "bedrooms") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()))) {
                        // line 149
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 150
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 151
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array());
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 153
$context["field"] == "garages") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "garages", array()))) {
                        // line 154
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 155
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 156
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "garages", array());
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 158
$context["field"] == "land_area") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array()))) {
                        // line 159
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 160
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Land Size", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 161
                        echo _twig_default_filter(call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array()))), "-");
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 163
$context["field"] == "area") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array()))) {
                        // line 164
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 165
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Built-Up", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 166
                        echo _twig_default_filter(call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array()))), "-");
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 168
$context["field"] == "contract_type") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array()))) {
                        // line 169
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 170
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contract type", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 171
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array());
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 173
$context["field"] == "agent") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()))) {
                        // line 174
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 175
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 176
                        echo $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "name", array());
                        echo "</span>
            </span>
          ";
                    } elseif (((                    // line 178
$context["field"] == "sku") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sku", array()))) {
                        // line 179
                        echo "            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">";
                        // line 180
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("SKU", "realtyspace")), "html", null, true);
                        echo ":</span>
                <span class=\"properties__param-value\">";
                        // line 181
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sku", array());
                        echo "</span>
            </span>
          ";
                    }
                    // line 184
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 185
                echo "      </span>
    </figure>
  ";
            } elseif (($this->getAttribute($this->getAttribute(            // line 187
(isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_style", array()) == "detailed")) {
                // line 188
                echo "    <figure class=\"item-photo__hover item-photo__hover--params\">
      ";
                // line 189
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_fields", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 190
                    echo "        ";
                    if ((($context["field"] == "rooms") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array()))) {
                        // line 191
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 192
$context["field"] == "bathrooms") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array()))) {
                        // line 193
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 194
$context["field"] == "bedrooms") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()))) {
                        // line 195
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 196
$context["field"] == "garages") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "garages", array()))) {
                        // line 197
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "garages", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 198
$context["field"] == "land_area") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array()))) {
                        // line 199
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Land Size", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "land_area", array())));
                        echo "</span>
        ";
                    } elseif (((                    // line 200
$context["field"] == "area") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array()))) {
                        // line 201
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Built-Up", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array())));
                        echo "</span>
        ";
                    } elseif (((                    // line 202
$context["field"] == "contract_type") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array()))) {
                        // line 203
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contract type", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 204
$context["field"] == "type") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()))) {
                        // line 205
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 206
$context["field"] == "agent") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()))) {
                        // line 207
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo $this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "agent", array()), "name", array());
                        echo "</span>
        ";
                    } elseif (((                    // line 208
$context["field"] == "sku") && $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sku", array()))) {
                        // line 209
                        echo "          <span class=\"properties__params\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("SKU", "realtyspace")), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "sku", array()), "html", null, true);
                        echo "</span>
        ";
                    }
                    // line 211
                    echo "      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 212
                echo "      ";
                if ($this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_show_desciption", array())) {
                    // line 213
                    echo "        <span class=\"properties__intro \">
          ";
                    // line 214
                    echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "preview", array(0 => $this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "excerpt_length", array()), 1 => false, 2 => false), "method");
                    echo "
        </span>
      ";
                }
                // line 217
                echo "      ";
                if ($this->getAttribute($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "property_card", array()), "hover_show_date", array())) {
                    // line 218
                    echo "        <span class=\"properties__time\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Added date", "realtyspace")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('i18n_time_ago')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "date", array(0 => "c"), "method"))), "html", null, true);
                    echo "</span>
      ";
                }
                // line 220
                echo "      <span class=\"properties__more\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("View details", "realtyspace")), "html", null, true);
                echo "</span>
    </figure>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 225
    public function getprice($__property__ = null, $__strong_price__ = false, $__show_wrapper__ = true)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "strong_price" => $__strong_price__,
            "show_wrapper" => $__show_wrapper__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 226
            echo "  ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "has_price", array())) {
                // line 227
                echo "    ";
                echo (((isset($context["strong_price"]) ? $context["strong_price"] : null)) ? ("<strong>") : (""));
                echo "
    ";
                // line 228
                echo call_user_func_array($this->env->getFilter('price')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price", array())));
                echo "
    ";
                // line 229
                echo (((isset($context["strong_price"]) ? $context["strong_price"] : null)) ? ("</strong>") : (""));
                echo "
    ";
                // line 230
                if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price_suffix", array())) {
                    // line 231
                    echo "      ";
                    if ((isset($context["show_wrapper"]) ? $context["show_wrapper"] : null)) {
                        // line 232
                        echo "        <span class=\"properties__offer-period\">
                    /";
                        // line 233
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price_suffix", array()), "html", null, true);
                        echo "
                </span>
      ";
                    } else {
                        // line 236
                        echo "        ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "price_suffix", array()), "html", null, true);
                        echo "
      ";
                    }
                    // line 238
                    echo "    ";
                }
                // line 239
                echo "  ";
            } else {
                // line 240
                echo "    <strong>
      ";
                // line 241
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "config_propgeneral_property_price_undefined", array()), "html", null, true);
                echo "
    </strong>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 248
    public function getaddress_link($__property__ = null, $__simple__ = false, $__show_link__ = true)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "simple" => $__simple__,
            "show_link" => $__show_link__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 249
            echo "  ";
            ob_start();
            // line 250
            echo "    <span class=\"properties__address-street\">";
            echo $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array());
            echo "</span>
    <span class=\"properties__address-city\">";
            // line 251
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "location", array()), ", "), "html", null, true);
            echo "</span>
  ";
            $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 253
            echo "
  ";
            // line 254
            if ((isset($context["show_link"]) ? $context["show_link"] : null)) {
                // line 255
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "link", array()), "html", null, true);
                echo "\" class=\"properties__address ";
                if ((isset($context["simple"]) ? $context["simple"] : null)) {
                    echo " properties__address--simple";
                }
                echo "\">
      ";
                // line 256
                echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
                echo "
    </a>
  ";
            } else {
                // line 259
                echo "    <div class=\"properties__address ";
                if ((isset($context["simple"]) ? $context["simple"] : null)) {
                    echo " properties__address--simple";
                }
                echo "\">
      ";
                // line 260
                echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
                echo "
    </div>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 265
    public function getribbon($__property__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 266
            echo "  ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array())) {
                // line 267
                echo "    <span class=\"properties__ribon\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "contract_type", array()), "html", null, true);
                echo "</span>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 271
    public function getpaypal_btn($__property__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 272
            echo "  ";
            // line 273
            echo "  ";
            if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "config_proppayment_enabled", array())) {
                // line 274
                echo "    <form action=\"https://www.";
                echo (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "config_proppayment_sandbox", array())) ? ("sandbox.") : (""));
                echo "paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">
      <input type=\"hidden\" name=\"notify_url\" value=\"";
                // line 275
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "url", array(0 => "/", 1 => array("AngellEYE_Paypal_Ipn_For_Wordpress" => "", "action" => "ipn_handler")), "method"), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
      <input type=\"hidden\" name=\"return\" value=";
                // line 277
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "current_url", array(0 => array("payment_status" => "success")), "method"), "html", null, true);
                echo ">
      <input type=\"hidden\" name=\"cancel_return\" value=\"";
                // line 278
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "current_url", array(0 => array("payment_status" => "error")), "method"), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"business\" value=\"";
                // line 279
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "config_proppayment_email", array()), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"lc\" value=\"US\">
      <input type=\"hidden\" name=\"item_name\" value=\"";
                // line 281
                echo twig_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Payment for publishing \"%s\" item", "realtyspace")), $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "name", array())), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"item_number\" value=\"";
                // line 282
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "id", array()), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"amount\" value=\"";
                // line 283
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "config_proppayment_amount", array()), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"currency_code\" value=\"";
                // line 284
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "config_proppayment_currency", array()), "html", null, true);
                echo "\">
      <input type=\"hidden\" name=\"button_subtype\" value=\"services\">
      <input type=\"hidden\" name=\"no_note\" value=\"0\">
      <input type=\"hidden\" name=\"bn\" value=\"PP-BuyNowBF:btn_paynow_SM.gif:NonHostedGuest\">
      <button name=\"submit\" type=\"submit\" class=\"properties__pay\">";
                // line 288
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Pay with PayPal", "realtyspace")), "html", null, true);
                echo "</button>
      <img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">
    </form>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 296
    public function getshort_params($__property__ = null, $__wrapper_class__ = null, $__in_half__ = false)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "wrapper_class" => $__wrapper_class__,
            "in_half" => $__in_half__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 297
            echo "  ";
            $context["macro"] = $this;
            // line 298
            echo "<dl ";
            if ((isset($context["wrapper_class"]) ? $context["wrapper_class"] : null)) {
                echo "class=\"";
                echo twig_escape_filter($this->env, (isset($context["wrapper_class"]) ? $context["wrapper_class"] : null), "html", null, true);
                echo "\"";
            }
            echo ">
  ";
            // line 299
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array())) {
                // line 300
                echo "    <dt>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type:", "realtyspace")), "html", null, true);
                echo "</dt>
    <dd>";
                // line 301
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "type", array()), "html", null, true);
                echo "</dd>
  ";
            }
            // line 303
            echo "  ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array())) {
                // line 304
                echo "    <dt>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Area:", "realtyspace")), "html", null, true);
                echo "</dt>
    <dd>";
                // line 305
                echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "area", array())));
                echo "</dd>
  ";
            }
            // line 307
            echo "  ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array())) {
                // line 308
                echo "    <dt>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms:", "realtyspace")), "html", null, true);
                echo "</dt>
    <dd>";
                // line 309
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "rooms", array()), "html", null, true);
                echo "</dd>
  ";
            }
            // line 311
            echo "  ";
            if ((isset($context["in_half"]) ? $context["in_half"] : null)) {
                // line 312
                echo "    </dl><dl ";
                if ((isset($context["wrapper_class"]) ? $context["wrapper_class"] : null)) {
                    echo "class=\"";
                    echo twig_escape_filter($this->env, (isset($context["wrapper_class"]) ? $context["wrapper_class"] : null), "html", null, true);
                    echo "\"";
                }
                echo ">
  ";
            }
            // line 314
            echo "  ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array())) {
                // line 315
                echo "    <dt>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms:", "realtyspace")), "html", null, true);
                echo "
    <dd>";
                // line 316
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bathrooms", array()), "html", null, true);
                echo "</dd>
  ";
            }
            // line 318
            echo "  ";
            if ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array())) {
                // line 319
                echo "    <dt>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms:", "realtyspace")), "html", null, true);
                echo "</dt>
    <dd>";
                // line 320
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "bedrooms", array()), "html", null, true);
                echo "</dd>
  ";
            }
            // line 322
            echo "  </dl>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 325
    public function getitems($__properties__ = null, $__type__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "properties" => $__properties__,
            "type" => $__type__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 326
            echo "  ";
            $context["__internal_d71bf761fc3ec5983898f307085d920dc55f30d4eaf1615baa24581b737fd6f4"] = $this;
            // line 327
            echo "  ";
            $context["__internal_d6ce6426cf6a31ccd7d88c3004b33dba8118333aa4da9966fd518594e18df4f3"] = $this;
            // line 328
            echo "  ";
            $context["__internal_0653cc1f5b6930cbdce3d78648d82ec1de7ff46f0b8b6b2aae20452e6ae3b7c3"] = $this->loadTemplate("macro.twig", "modules/property/macro.twig", 328);
            // line 329
            echo "
  ";
            // line 330
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                // line 331
                echo "    ";
                if (((isset($context["type"]) ? $context["type"] : null) == "grid")) {
                    // line 332
                    echo "      ";
                    echo $context["__internal_d71bf761fc3ec5983898f307085d920dc55f30d4eaf1615baa24581b737fd6f4"]->getgrid_item($context["property"]);
                    echo "
    ";
                } else {
                    // line 334
                    echo "      ";
                    echo $context["__internal_d6ce6426cf6a31ccd7d88c3004b33dba8118333aa4da9966fd518594e18df4f3"]->getlist_item($context["property"]);
                    echo "
    ";
                }
                // line 336
                echo "  ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 337
                echo "    ";
                echo $context["__internal_0653cc1f5b6930cbdce3d78648d82ec1de7ff46f0b8b6b2aae20452e6ae3b7c3"]->getno_items_available(call_user_func_array($this->env->getFunction('__')->getCallable(), array("No properties available", "realtyspace")));
                echo "
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 341
    public function getproperty_table_rows($__properties__ = null, $__table_columns__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "properties" => $__properties__,
            "table_columns" => $__table_columns__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 342
            echo "  ";
            $context["__internal_5acd5b813cce51baddc36af8cbb02b61e52b9b3217ad977eaa9b68c5c6af3c45"] = $this;
            // line 343
            echo "  ";
            $context["__internal_8002e006f827c21cdeddcf16509a10e9ac7f127a8ac3c6ec440f14b7cba8a357"] = $this;
            // line 344
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                // line 345
                echo "    <tr>
      ";
                // line 346
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["table_columns"]) ? $context["table_columns"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 347
                    echo "        ";
                    if (($context["field"] == "location")) {
                        // line 348
                        echo "          <td class=\"datatable__cell-1\">";
                        echo $context["__internal_5acd5b813cce51baddc36af8cbb02b61e52b9b3217ad977eaa9b68c5c6af3c45"]->getaddress_link($context["property"], false, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 349
$context["field"] == "rooms")) {
                        // line 350
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "rooms", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 351
$context["field"] == "bathrooms")) {
                        // line 352
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "bathrooms", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 353
$context["field"] == "bedrooms")) {
                        // line 354
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "bedrooms", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 355
$context["field"] == "garages")) {
                        // line 356
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "garages", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 357
$context["field"] == "land_area")) {
                        // line 358
                        echo "          <td class=\"datatable__cell\">";
                        echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute($context["property"], "land_area", array())));
                        echo "</td>
        ";
                    } elseif ((                    // line 359
$context["field"] == "area")) {
                        // line 360
                        echo "          <td class=\"datatable__cell\">";
                        echo call_user_func_array($this->env->getFilter('area')->getCallable(), array($this->getAttribute($context["property"], "area", array())));
                        echo "</td>
        ";
                    } elseif ((                    // line 361
$context["field"] == "contract_type")) {
                        // line 362
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "contract_type", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 363
$context["field"] == "type")) {
                        // line 364
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "type", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 365
$context["field"] == "agent")) {
                        // line 366
                        echo "          <td class=\"datatable__cell\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["property"], "agent", array()), "name", array()), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 367
$context["field"] == "date")) {
                        // line 368
                        echo "          <td class=\"datatable__cell-4\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('time_ago')->getCallable(), array($this->getAttribute($context["property"], "date", array()))), "html", null, true);
                        echo "</td>
        ";
                    } elseif ((                    // line 369
$context["field"] == "price")) {
                        // line 370
                        echo "          <td class=\"datatable__cell-2\">";
                        echo $context["__internal_8002e006f827c21cdeddcf16509a10e9ac7f127a8ac3c6ec440f14b7cba8a357"]->getprice($context["property"], true, false);
                        echo "</td>
        ";
                    } elseif ((                    // line 371
$context["field"] == "more_btn")) {
                        // line 372
                        echo "          <td class=\"datatable__cell-5\">
            <a href=\"";
                        // line 373
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "link", array()), "html", null, true);
                        echo "\" class=\"datatable__more\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("More", "realtyspace")), "html", null, true);
                        echo "</a></td>
        ";
                    }
                    // line 375
                    echo "      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 376
                echo "    </tr>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 380
    public function getproperty_table_headings($__table_columns__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "table_columns" => $__table_columns__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 381
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["table_columns"]) ? $context["table_columns"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 382
                echo "    ";
                if (($context["field"] == "location")) {
                    // line 383
                    echo "      <th class=\"datatable__head-1\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Location Address", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 384
$context["field"] == "rooms")) {
                    // line 385
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Rooms", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 386
$context["field"] == "bathrooms")) {
                    // line 387
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bathrooms", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 388
$context["field"] == "bedrooms")) {
                    // line 389
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Bedrooms", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 390
$context["field"] == "garages")) {
                    // line 391
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Garages", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 392
$context["field"] == "land_area")) {
                    // line 393
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Land Size", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 394
$context["field"] == "area")) {
                    // line 395
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Built-Up", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 396
$context["field"] == "contract_type")) {
                    // line 397
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contract type", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 398
$context["field"] == "type")) {
                    // line 399
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Property type", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 400
$context["field"] == "agent")) {
                    // line 401
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Agent", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 402
$context["field"] == "date")) {
                    // line 403
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Date", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 404
$context["field"] == "price")) {
                    // line 405
                    echo "      <th class=\"datatable__head\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Price", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                } elseif ((                // line 406
$context["field"] == "more_btn")) {
                    // line 407
                    echo "      <th class=\"datatable__head-5\">";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Details", "realtyspace")), "html", null, true);
                    echo "</th>
    ";
                }
                // line 409
                echo "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 413
    public function getshow_map($__type__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "type" => $__type__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 414
            echo "  ";
            $context["tooltip_template_id"] = call_user_func_array($this->env->getFunction('js_template')->getCallable(), array("property-map-tooltip", "modules/property/misc/map-tooltip.twig"));
            // line 415
            echo "  ";
            $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("show_map", array("infoboxTemplate" =>             // line 416
(isset($context["tooltip_template_id"]) ? $context["tooltip_template_id"] : null), "theme" => "dark", "fullscreen" => false)));
            // line 420
            echo "
  <div class=\"map map--index js-map map--";
            // line 421
            echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "html", null, true);
            echo "\">
    <div class=\"map__buttons\">
      <button type=\"button\" class=\"map__change-map js-map-btn\">";
            // line 423
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Show map", "realtyspace")), "html", null, true);
            echo "</button>
    </div>
    <div class=\"map__wrap\">
      <div class=\"map__view js-map-index-canvas \"></div>
    </div>
  </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "modules/property/macro.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1519 => 423,  1512 => 421,  1509 => 420,  1507 => 416,  1505 => 415,  1502 => 414,  1490 => 413,  1471 => 409,  1465 => 407,  1463 => 406,  1458 => 405,  1456 => 404,  1451 => 403,  1449 => 402,  1444 => 401,  1442 => 400,  1437 => 399,  1435 => 398,  1430 => 397,  1428 => 396,  1423 => 395,  1421 => 394,  1416 => 393,  1414 => 392,  1409 => 391,  1407 => 390,  1402 => 389,  1400 => 388,  1395 => 387,  1393 => 386,  1388 => 385,  1386 => 384,  1381 => 383,  1378 => 382,  1373 => 381,  1361 => 380,  1341 => 376,  1335 => 375,  1328 => 373,  1325 => 372,  1323 => 371,  1318 => 370,  1316 => 369,  1311 => 368,  1309 => 367,  1304 => 366,  1302 => 365,  1297 => 364,  1295 => 363,  1290 => 362,  1288 => 361,  1283 => 360,  1281 => 359,  1276 => 358,  1274 => 357,  1269 => 356,  1267 => 355,  1262 => 354,  1260 => 353,  1255 => 352,  1253 => 351,  1248 => 350,  1246 => 349,  1241 => 348,  1238 => 347,  1234 => 346,  1231 => 345,  1226 => 344,  1223 => 343,  1220 => 342,  1207 => 341,  1185 => 337,  1180 => 336,  1174 => 334,  1168 => 332,  1165 => 331,  1160 => 330,  1157 => 329,  1154 => 328,  1151 => 327,  1148 => 326,  1135 => 325,  1119 => 322,  1114 => 320,  1109 => 319,  1106 => 318,  1101 => 316,  1096 => 315,  1093 => 314,  1083 => 312,  1080 => 311,  1075 => 309,  1070 => 308,  1067 => 307,  1062 => 305,  1057 => 304,  1054 => 303,  1049 => 301,  1044 => 300,  1042 => 299,  1033 => 298,  1030 => 297,  1016 => 296,  996 => 288,  989 => 284,  985 => 283,  981 => 282,  977 => 281,  972 => 279,  968 => 278,  964 => 277,  959 => 275,  954 => 274,  951 => 273,  949 => 272,  937 => 271,  918 => 267,  915 => 266,  903 => 265,  884 => 260,  877 => 259,  871 => 256,  862 => 255,  860 => 254,  857 => 253,  852 => 251,  847 => 250,  844 => 249,  830 => 248,  811 => 241,  808 => 240,  805 => 239,  802 => 238,  796 => 236,  790 => 233,  787 => 232,  784 => 231,  782 => 230,  778 => 229,  774 => 228,  769 => 227,  766 => 226,  752 => 225,  732 => 220,  724 => 218,  721 => 217,  715 => 214,  712 => 213,  709 => 212,  703 => 211,  695 => 209,  693 => 208,  686 => 207,  684 => 206,  677 => 205,  675 => 204,  668 => 203,  666 => 202,  659 => 201,  657 => 200,  650 => 199,  648 => 198,  641 => 197,  639 => 196,  632 => 195,  630 => 194,  623 => 193,  621 => 192,  614 => 191,  611 => 190,  607 => 189,  604 => 188,  602 => 187,  598 => 185,  592 => 184,  586 => 181,  582 => 180,  579 => 179,  577 => 178,  572 => 176,  568 => 175,  565 => 174,  563 => 173,  558 => 171,  554 => 170,  551 => 169,  549 => 168,  544 => 166,  540 => 165,  537 => 164,  535 => 163,  530 => 161,  526 => 160,  523 => 159,  521 => 158,  516 => 156,  512 => 155,  509 => 154,  507 => 153,  502 => 151,  498 => 150,  495 => 149,  493 => 148,  488 => 146,  484 => 145,  481 => 144,  479 => 143,  474 => 141,  470 => 140,  467 => 139,  464 => 138,  460 => 137,  456 => 135,  450 => 133,  448 => 132,  445 => 131,  442 => 130,  440 => 129,  428 => 128,  412 => 125,  406 => 123,  403 => 122,  397 => 119,  394 => 118,  388 => 115,  377 => 114,  374 => 113,  371 => 112,  365 => 109,  362 => 108,  359 => 107,  353 => 105,  351 => 104,  346 => 103,  344 => 102,  341 => 101,  338 => 100,  335 => 99,  333 => 98,  315 => 97,  292 => 87,  288 => 86,  282 => 83,  272 => 78,  266 => 77,  261 => 75,  257 => 74,  247 => 67,  239 => 62,  232 => 58,  227 => 55,  225 => 54,  224 => 53,  221 => 52,  218 => 51,  215 => 50,  202 => 49,  176 => 36,  167 => 30,  161 => 27,  158 => 26,  153 => 24,  146 => 23,  144 => 22,  139 => 19,  137 => 18,  136 => 13,  133 => 12,  130 => 11,  117 => 10,  99 => 6,  87 => 5,  84 => 4,  70 => 3,  64 => 411,  61 => 379,  58 => 340,  55 => 324,  50 => 293,  47 => 270,  44 => 264,  39 => 245,  36 => 224,  33 => 127,  29 => 95,  25 => 47,  22 => 9,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/macro.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/macro.twig");
    }
}
