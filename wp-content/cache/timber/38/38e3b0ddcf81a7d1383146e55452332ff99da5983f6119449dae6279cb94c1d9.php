<?php

/* modules/property/macro.twig */
class __TwigTemplate_3b43872d95e76e7700145e1e00106e72b69c7e46f0317770de13e18b9cbd89e8 extends Twig_Template
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
            $context["__internal_50cf9705f3d645b409d734936a29de67483f3b644542f2bc292c4f89088cd96e"] = $this;
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
            echo $context["__internal_50cf9705f3d645b409d734936a29de67483f3b644542f2bc292c4f89088cd96e"]->getitems((isset($context["results"]) ? $context["results"] : null), (isset($context["mode"]) ? $context["mode"] : null));
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
            $context["__internal_d5f89b6b1c84c71402cf91eecba8a53b8df646159cd2d5ff16789b54d87dc826"] = $this;
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
            echo $context["__internal_d5f89b6b1c84c71402cf91eecba8a53b8df646159cd2d5ff16789b54d87dc826"]->getthumbnail((isset($context["property"]) ? $context["property"] : null), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "hover_params", array()), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "hover_btn", array()), true, true, $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "gallery_mode", array()), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "index", array()));
            echo "
      <!-- end of block .properties__thumb-->
      <div class=\"properties__info\">
        ";
            // line 30
            echo $context["__internal_d5f89b6b1c84c71402cf91eecba8a53b8df646159cd2d5ff16789b54d87dc826"]->getaddress_link((isset($context["property"]) ? $context["property"] : null));
            echo "
        <!-- end of block .properties__param-->
        <hr class=\"divider--dotted properties__divider\">
        <div class=\"properties__offer\">
          <div class=\"properties__offer-column\">
            <div class=\"properties__offer-value\">
              ";
            // line 36
            echo $context["__internal_d5f89b6b1c84c71402cf91eecba8a53b8df646159cd2d5ff16789b54d87dc826"]->getprice((isset($context["property"]) ? $context["property"] : null), true);
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
            $context["__internal_760cbcaa9ae220af4b3cb71dfa4b57930e680b5de6eb2071f7719c2601aeed7e"] = $this;
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
            echo $context["__internal_760cbcaa9ae220af4b3cb71dfa4b57930e680b5de6eb2071f7719c2601aeed7e"]->getthumbnail((isset($context["property"]) ? $context["property"] : null), true, false, true, true, false);
            echo "
      <!-- end of block .properties__thumb-->
      <div class=\"properties__details\">
        <div class=\"properties__info\">
          ";
            // line 62
            echo $context["__internal_760cbcaa9ae220af4b3cb71dfa4b57930e680b5de6eb2071f7719c2601aeed7e"]->getaddress_link((isset($context["property"]) ? $context["property"] : null));
            echo "

          <div class=\"properties__offer\">
            <div class=\"properties__offer-column\">
              <div class=\"properties__offer-value\">
                ";
            // line 67
            echo $context["__internal_760cbcaa9ae220af4b3cb71dfa4b57930e680b5de6eb2071f7719c2601aeed7e"]->getprice((isset($context["property"]) ? $context["property"] : null), true);
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
            $context["__internal_ce4780751adae062f13d3e26ba9d2879161ec0d82b30da8518ec5e6b0024d3a8"] = $this;
            // line 100
            echo "  ";
            $context["__internal_9d31d5e7328f999739a8f35d3b26ff88d086262bbcbe00c5c3d598e82cb12099"] = $this->loadTemplate("macro.twig", "modules/property/macro.twig", 100);
            // line 101
            echo "  <div class=\"properties__thumb\">
    ";
            // line 102
            ob_start();
            // line 103
            echo "      ";
            echo $context["__internal_9d31d5e7328f999739a8f35d3b26ff88d086262bbcbe00c5c3d598e82cb12099"]->getthumbnail($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array()), "src", array()), 554, 360, null, (isset($context["gallery_mode"]) ? $context["gallery_mode"] : null), (($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "thumbnail", array(), "any", false, true), "alt", array()), $this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()))) : ($this->getAttribute((isset($context["property"]) ? $context["property"] : null), "title", array()))));
            echo "
      ";
            // line 104
            if ((isset($context["show_params"]) ? $context["show_params"] : null)) {
                // line 105
                echo "        ";
                echo $context["__internal_ce4780751adae062f13d3e26ba9d2879161ec0d82b30da8518ec5e6b0024d3a8"]->gethover_params((isset($context["property"]) ? $context["property"] : null));
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
                echo $context["__internal_ce4780751adae062f13d3e26ba9d2879161ec0d82b30da8518ec5e6b0024d3a8"]->getribbon((isset($context["property"]) ? $context["property"] : null));
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
            $context["__internal_303c79fa6dee9c54e25106481305b337f10bc4bb02172491b92968f2dace126d"] = $this;
            // line 327
            echo "  ";
            $context["__internal_77a5e219d798cee869947fdf764ded8b939cdd1bbc0c6ac1dc1b761ea779e4ee"] = $this;
            // line 328
            echo "  ";
            $context["__internal_39907d3aa587091384373951a2c236b907e645e69397b34a51fe0f0f0d7bdec8"] = $this->loadTemplate("macro.twig", "modules/property/macro.twig", 328);
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
                    echo $context["__internal_303c79fa6dee9c54e25106481305b337f10bc4bb02172491b92968f2dace126d"]->getgrid_item($context["property"]);
                    echo "
    ";
                } else {
                    // line 334
                    echo "      ";
                    echo $context["__internal_77a5e219d798cee869947fdf764ded8b939cdd1bbc0c6ac1dc1b761ea779e4ee"]->getlist_item($context["property"]);
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
                echo $context["__internal_39907d3aa587091384373951a2c236b907e645e69397b34a51fe0f0f0d7bdec8"]->getno_items_available(call_user_func_array($this->env->getFunction('__')->getCallable(), array("No properties available", "realtyspace")));
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
            $context["__internal_1a418f398ff5e01dffb790a24e150129cb2ba9f2a218e801c196bd37b6a9483c"] = $this;
            // line 343
            echo "  ";
            $context["__internal_5b4c3b29216ed94a152957b6d7bf35f1ec7a9ec30776b933300c43275a93f7ad"] = $this;
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
                        echo $context["__internal_1a418f398ff5e01dffb790a24e150129cb2ba9f2a218e801c196bd37b6a9483c"]->getaddress_link($context["property"], false, true);
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
                        echo $context["__internal_5b4c3b29216ed94a152957b6d7bf35f1ec7a9ec30776b933300c43275a93f7ad"]->getprice($context["property"], true, false);
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
        return new Twig_Source("{# @var property \\cf47\\theme\\realtyspace\\module\\property\\Entity #}

{% macro listing(results, mode, submode) %}
  {% from _self import items %}
  <div class=\"listing listing--{{ mode }} {% if submode %} listing--{{ submode }}{% endif %} properties properties--{{ mode }}\">
    {{ items(results, mode) }}
  </div>
{% endmacro %}

{% macro grid_item(property, options) %}
  {% from _self import price, address_link, thumbnail %}

  {% set options = {
  'gallery_mode': false,
  'hover_params': true,
  'hover_btn': false,
  'index': null
  }|merge(options|default({})) %}

  <div class=\"listing__item\">
    <div class=\"properties__item\"
        {% if options.gallery_mode %}
          data-item data-size=\"{{ property.thumbnail.width }}x{{ property.thumbnail.height }}\"
          data-src=\"{{ property.thumbnail.src }}\"
        {% endif %}
    >
      {{ thumbnail(property, options.hover_params, options.hover_btn, true, true, options.gallery_mode, options.index) }}
      <!-- end of block .properties__thumb-->
      <div class=\"properties__info\">
        {{ address_link(property) }}
        <!-- end of block .properties__param-->
        <hr class=\"divider--dotted properties__divider\">
        <div class=\"properties__offer\">
          <div class=\"properties__offer-column\">
            <div class=\"properties__offer-value\">
              {{ price(property, true) }}
            </div>
          </div>
        </div>
      </div>
      <!-- end of block .properties__info-->
    </div>

    <!-- end of block .properties__item-->
  </div>
{% endmacro %}


{% macro list_item(property, options) %}
  {% import 'macro.twig' as macro %}
  {% from _self import price, address_link, thumbnail %}

  {% set options = {
  }|merge(options|default({})) %}

  <div class=\"listing__item\">
    <div class=\"properties__item\">
      {{ thumbnail(property, true, false, true, true, false) }}
      <!-- end of block .properties__thumb-->
      <div class=\"properties__details\">
        <div class=\"properties__info\">
          {{ address_link(property) }}

          <div class=\"properties__offer\">
            <div class=\"properties__offer-column\">
              <div class=\"properties__offer-value\">
                {{ price(property, true) }}
              </div>
            </div>
          </div>
          <hr class=\"divider--dotted properties__divider\">

          <div class=\"properties__params--mob\">
            <a href=\"{{ property.link }}\" class=\"properties__more\">
              {{ __('View details', 'realtyspace') }}
            </a>
            <span class=\"properties__params\">{{ __('Built-Up', 'realtyspace') }} - {{ property.area|area|default('-')|raw }}</span>
            <span class=\"properties__params\">{{ __('Land Size', 'realtyspace') }} - {{ property.area|area|default('-')|raw }}</span>
          </div>
        </div>

        <div class=\"properties__intro\">
          <p>{{ property.excerpt|default(property.content|excerpt(100))|raw }}</p>
        </div>

        <a href=\"{{ property.link }}\" class=\"properties__more\">
          {{ __('View details', 'realtyspace') }}
        </a>
      </div>
      <!-- end of block .properties__info-->
    </div>
  </div>
  <!-- end of block .properties__item-->
{% endmacro %}


{% macro thumbnail(property, show_params, show_imagebtn, show_ribbon = true, show_link = true, gallery_mode=false, gallery_index) %}
  {# @var property \\cf47\\plugin\\realtyspace\\module\\property\\Entity #}
  {% from _self import hover_params as params, ribbon %}
  {% from 'macro.twig' import thumbnail as thumb %}
  <div class=\"properties__thumb\">
    {% set content %}
      {{ thumb(property.thumbnail.src, 554, 360, null, gallery_mode, property.thumbnail.alt|default(property.title)) }}
      {% if show_params %}
        {{ params(property) }}
      {% endif %}
      {% if show_imagebtn %}
        <figure class=\"item-photo__hover\">
          <span class=\"item-photo__more\">{{ __('View', 'realtyspace') }}</span>
        </figure>
      {% endif %}
    {% endset %}
    {% if show_link %}
      <a href=\"{{ property.link }}\" class=\"item-photo\" {% if gallery_mode %} data-index={{ gallery_index }} data-trigger{% endif %}>
        {{ content }}
      </a>
    {% else %}
      <div class=\"item-photo\">
        {{ content }}
      </div>
    {% endif %}
    {% if show_ribbon %}
      {{ ribbon(property) }}
    {% endif %}
  </div>
{% endmacro %}

{% macro hover_params(property) %}
  {# @var property \\cf47\\plugin\\realtyspace\\module\\property\\Entity #}
  {% if layout.property_card.hover_style == 'minimal' %}
    <figure class=\"item-photo__hover item-photo__hover--params  item-photo__hover--params-columns\">
      {% if  'type' in layout.property_card.hover_fields and  property.type %}
        <span class=\"properties__param-type\">{{ property.type }}</span>
      {% endif %}

      <span class=\"properties__param\">
        {% for field in layout.property_card.hover_fields %}
          {% if field == 'rooms' and property.rooms %}
            <span class=\"properties__param-column\">
                    <span class=\"properties__param-label\">{{ __('Rooms', 'realtyspace') }}:</span>
                    <span class=\"properties__param-value\">{{ property.rooms|default('-')|raw }}</span>
                </span>
          {% elseif field == 'bathrooms' and property.bathrooms %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Bathrooms', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.bathrooms|raw }}</span>
            </span>
          {% elseif field == 'bedrooms' and property.bedrooms %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Bedrooms', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.bedrooms|raw }}</span>
            </span>
          {% elseif field == 'garages' and property.garages %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Garages', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.garages|raw }}</span>
            </span>
          {% elseif field == 'land_area' and property.land_area %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Land Size', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.land_area|area|default('-')|raw }}</span>
            </span>
          {% elseif field == 'area' and property.area %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Built-Up', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.area|area|default('-')|raw }}</span>
            </span>
          {% elseif field == 'contract_type' and property.contract_type %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Contract type', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.contract_type|raw }}</span>
            </span>
          {% elseif field == 'agent' and property.agent %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('Agent', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.agent.name|raw }}</span>
            </span>
          {% elseif field == 'sku' and property.sku %}
            <span class=\"properties__param-column\">
                <span class=\"properties__param-label\">{{ __('SKU', 'realtyspace') }}:</span>
                <span class=\"properties__param-value\">{{ property.sku|raw }}</span>
            </span>
          {% endif %}
        {% endfor %}
      </span>
    </figure>
  {% elseif layout.property_card.hover_style == 'detailed' %}
    <figure class=\"item-photo__hover item-photo__hover--params\">
      {% for field in layout.property_card.hover_fields %}
        {% if field == 'rooms' and property.rooms %}
          <span class=\"properties__params\">{{ __('Rooms', 'realtyspace') }} - {{ property.rooms|raw }}</span>
        {% elseif field == 'bathrooms' and property.bathrooms %}
          <span class=\"properties__params\">{{ __('Bathrooms', 'realtyspace') }} - {{ property.bathrooms|raw }}</span>
        {% elseif field == 'bedrooms' and property.bedrooms %}
          <span class=\"properties__params\">{{ __('Bedrooms', 'realtyspace') }} - {{ property.bedrooms|raw }}</span>
        {% elseif field == 'garages' and property.garages %}
          <span class=\"properties__params\">{{ __('Garages', 'realtyspace') }} - {{ property.garages|raw }}</span>
        {% elseif field == 'land_area' and property.land_area %}
          <span class=\"properties__params\">{{ __('Land Size', 'realtyspace') }} - {{ property.land_area|area|raw }}</span>
        {% elseif field == 'area' and property.area %}
          <span class=\"properties__params\">{{ __('Built-Up', 'realtyspace') }} - {{ property.area|area|raw }}</span>
        {% elseif field == 'contract_type' and property.contract_type %}
          <span class=\"properties__params\">{{ __('Contract type', 'realtyspace') }} - {{ property.contract_type|raw }}</span>
        {% elseif field == 'type' and property.type %}
          <span class=\"properties__params\">{{ __('Property type', 'realtyspace') }} - {{ property.type|raw }}</span>
        {% elseif field == 'agent' and property.agent %}
          <span class=\"properties__params\">{{ __('Agent', 'realtyspace') }} - {{ property.agent.name|raw }}</span>
        {% elseif field == 'sku' and property.sku %}
          <span class=\"properties__params\">{{ __('SKU', 'realtyspace') }} - {{ property.sku }}</span>
        {% endif %}
      {% endfor %}
      {% if layout.property_card.hover_show_desciption %}
        <span class=\"properties__intro \">
          {{ property.preview(layout.property_card.excerpt_length, false, false)|raw }}
        </span>
      {% endif %}
      {% if layout.property_card.hover_show_date %}
        <span class=\"properties__time\">{{ __('Added date', 'realtyspace') }}: {{ property.date('c')|i18n_time_ago }}</span>
      {% endif %}
      <span class=\"properties__more\">{{ __('View details', 'realtyspace') }}</span>
    </figure>
  {% endif %}
{% endmacro %}

{% macro price(property, strong_price = false, show_wrapper = true) %}
  {% if property.has_price %}
    {{ strong_price ? '<strong>' }}
    {{ property.price|price }}
    {{ strong_price ? '</strong>' }}
    {% if property.price_suffix %}
      {% if show_wrapper %}
        <span class=\"properties__offer-period\">
                    /{{ property.price_suffix }}
                </span>
      {% else %}
        {{ property.price_suffix }}
      {% endif %}
    {% endif %}
  {% else %}
    <strong>
      {{ option.config_propgeneral_property_price_undefined }}
    </strong>
  {% endif %}
{% endmacro %}



{% macro address_link(property, simple = false, show_link = true) %}
  {% set content %}
    <span class=\"properties__address-street\">{{ property.title|raw }}</span>
    <span class=\"properties__address-city\">{{ property.location|join(', ') }}</span>
  {% endset %}

  {% if show_link %}
    <a href=\"{{ property.link }}\" class=\"properties__address {% if simple %} properties__address--simple{% endif %}\">
      {{ content }}
    </a>
  {% else %}
    <div class=\"properties__address {% if simple %} properties__address--simple{% endif %}\">
      {{ content }}
    </div>
  {% endif %}
{% endmacro %}

{% macro ribbon(property) %}
  {% if property.contract_type %}
    <span class=\"properties__ribon\">{{ property.contract_type }}</span>
  {% endif %}
{% endmacro %}

{% macro paypal_btn(property) %}
  {# @var property \\cf47\\theme\\realtyspace\\module\\property\\Property #}
  {% if option.config_proppayment_enabled %}
    <form action=\"https://www.{{ option.config_proppayment_sandbox ? 'sandbox.' }}paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">
      <input type=\"hidden\" name=\"notify_url\" value=\"{{ wpurl.url('/', {'AngellEYE_Paypal_Ipn_For_Wordpress': '', 'action': 'ipn_handler'}) }}\">
      <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
      <input type=\"hidden\" name=\"return\" value={{ wpurl.current_url({'payment_status': 'success'}) }}>
      <input type=\"hidden\" name=\"cancel_return\" value=\"{{ wpurl.current_url({'payment_status': 'error'}) }}\">
      <input type=\"hidden\" name=\"business\" value=\"{{ option.config_proppayment_email }}\">
      <input type=\"hidden\" name=\"lc\" value=\"US\">
      <input type=\"hidden\" name=\"item_name\" value=\"{{ __('Payment for publishing \"%s\" item', 'realtyspace')|format(property.name) }}\">
      <input type=\"hidden\" name=\"item_number\" value=\"{{ property.id }}\">
      <input type=\"hidden\" name=\"amount\" value=\"{{ option.config_proppayment_amount }}\">
      <input type=\"hidden\" name=\"currency_code\" value=\"{{ option.config_proppayment_currency }}\">
      <input type=\"hidden\" name=\"button_subtype\" value=\"services\">
      <input type=\"hidden\" name=\"no_note\" value=\"0\">
      <input type=\"hidden\" name=\"bn\" value=\"PP-BuyNowBF:btn_paynow_SM.gif:NonHostedGuest\">
      <button name=\"submit\" type=\"submit\" class=\"properties__pay\">{{ __('Pay with PayPal', 'realtyspace') }}</button>
      <img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">
    </form>
  {% endif %}
{% endmacro %}



{% macro short_params(property, wrapper_class, in_half = false) %}
  {% import _self as macro %}
<dl {% if wrapper_class %}class=\"{{ wrapper_class }}\"{% endif %}>
  {% if property.type %}
    <dt>{{ __('Property type:', 'realtyspace') }}</dt>
    <dd>{{ property.type }}</dd>
  {% endif %}
  {% if property.area %}
    <dt>{{ __('Area:', 'realtyspace') }}</dt>
    <dd>{{ property.area|area }}</dd>
  {% endif %}
  {% if property.rooms %}
    <dt>{{ __('Rooms:', 'realtyspace') }}</dt>
    <dd>{{ property.rooms }}</dd>
  {% endif %}
  {% if in_half %}
    </dl><dl {% if wrapper_class %}class=\"{{ wrapper_class }}\"{% endif %}>
  {% endif %}
  {% if property.bathrooms %}
    <dt>{{ __('Bathrooms:', 'realtyspace') }}
    <dd>{{ property.bathrooms }}</dd>
  {% endif %}
  {% if property.bedrooms %}
    <dt>{{ __('Bedrooms:', 'realtyspace') }}</dt>
    <dd>{{ property.bedrooms }}</dd>
  {% endif %}
  </dl>
{% endmacro %}

{% macro items(properties, type) %}
  {% from _self import grid_item %}
  {% from _self import list_item %}
  {% from 'macro.twig' import no_items_available %}

  {% for property in properties %}
    {% if type == 'grid' %}
      {{ grid_item(property) }}
    {% else %}
      {{ list_item(property) }}
    {% endif %}
  {% else %}
    {{ no_items_available(__('No properties available', 'realtyspace')) }}
  {% endfor %}
{% endmacro %}

{% macro property_table_rows(properties, table_columns) %}
  {% from _self import address_link %}
  {% from _self import price %}
  {% for property in properties %}
    <tr>
      {% for field in table_columns %}
        {% if field == 'location' %}
          <td class=\"datatable__cell-1\">{{ address_link(property, false, true) }}</td>
        {% elseif field == 'rooms' %}
          <td class=\"datatable__cell\">{{ property.rooms }}</td>
        {% elseif field == 'bathrooms' %}
          <td class=\"datatable__cell\">{{ property.bathrooms }}</td>
        {% elseif field == 'bedrooms' %}
          <td class=\"datatable__cell\">{{ property.bedrooms }}</td>
        {% elseif field == 'garages' %}
          <td class=\"datatable__cell\">{{ property.garages }}</td>
        {% elseif field == 'land_area' %}
          <td class=\"datatable__cell\">{{ property.land_area|area }}</td>
        {% elseif field == 'area' %}
          <td class=\"datatable__cell\">{{ property.area|area }}</td>
        {% elseif field == 'contract_type' %}
          <td class=\"datatable__cell\">{{ property.contract_type }}</td>
        {% elseif field == 'type' %}
          <td class=\"datatable__cell\">{{ property.type }}</td>
        {% elseif field == 'agent' %}
          <td class=\"datatable__cell\">{{ property.agent.name }}</td>
        {% elseif field == 'date' %}
          <td class=\"datatable__cell-4\">{{ property.date|time_ago }}</td>
        {% elseif field == 'price' %}
          <td class=\"datatable__cell-2\">{{ price(property, true, false) }}</td>
        {% elseif field == 'more_btn' %}
          <td class=\"datatable__cell-5\">
            <a href=\"{{ property.link }}\" class=\"datatable__more\">{{ __('More', 'realtyspace') }}</a></td>
        {% endif %}
      {% endfor %}
    </tr>
  {% endfor %}
{% endmacro %}

{% macro property_table_headings(table_columns) %}
  {% for field in table_columns %}
    {% if field == 'location' %}
      <th class=\"datatable__head-1\">{{ __('Location Address', 'realtyspace') }}</th>
    {% elseif field == 'rooms' %}
      <th class=\"datatable__head\">{{ __('Rooms', 'realtyspace') }}</th>
    {% elseif field == 'bathrooms' %}
      <th class=\"datatable__head\">{{ __('Bathrooms', 'realtyspace') }}</th>
    {% elseif field == 'bedrooms' %}
      <th class=\"datatable__head\">{{ __('Bedrooms', 'realtyspace') }}</th>
    {% elseif field == 'garages' %}
      <th class=\"datatable__head\">{{ __('Garages', 'realtyspace') }}</th>
    {% elseif field == 'land_area' %}
      <th class=\"datatable__head\">{{ __('Land Size', 'realtyspace') }}</th>
    {% elseif field == 'area' %}
      <th class=\"datatable__head\">{{ __('Built-Up', 'realtyspace') }}</th>
    {% elseif field == 'contract_type' %}
      <th class=\"datatable__head\">{{ __('Contract type', 'realtyspace') }}</th>
    {% elseif field == 'type' %}
      <th class=\"datatable__head\">{{ __('Property type', 'realtyspace') }}</th>
    {% elseif field == 'agent' %}
      <th class=\"datatable__head\">{{ __('Agent', 'realtyspace') }}</th>
    {% elseif field == 'date' %}
      <th class=\"datatable__head\">{{ __('Date', 'realtyspace') }}</th>
    {% elseif field == 'price' %}
      <th class=\"datatable__head\">{{ __('Price', 'realtyspace') }}</th>
    {% elseif field == 'more_btn' %}
      <th class=\"datatable__head-5\">{{ __('Details', 'realtyspace') }}</th>
    {% endif %}
  {% endfor %}
{% endmacro %}


{% macro show_map(type) %}
  {% set tooltip_template_id = js_template('property-map-tooltip', 'modules/property/misc/map-tooltip.twig') %}
  {% set module_id = js_module('show_map', {
    'infoboxTemplate': tooltip_template_id,
    'theme': 'dark',
    'fullscreen': false
  }) %}

  <div class=\"map map--index js-map map--{{ type }}\" id=\"{{ module_id }}\">
    <div class=\"map__buttons\">
      <button type=\"button\" class=\"map__change-map js-map-btn\">{{ __('Show map', 'realtyspace') }}</button>
    </div>
    <div class=\"map__wrap\">
      <div class=\"map__view js-map-index-canvas \"></div>
    </div>
  </div>
{% endmacro %}", "modules/property/macro.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/property/macro.twig");
    }
}
