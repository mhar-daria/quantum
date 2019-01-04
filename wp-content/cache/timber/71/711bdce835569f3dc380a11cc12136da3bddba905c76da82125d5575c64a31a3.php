<?php

/* partials/header.twig */
class __TwigTemplate_c36eb3de16b362d8914785f4b0d653bdee6865d601d05b98c035c9cd96d45642 extends Twig_Template
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
        // line 1
        echo "<header class=\"
header
";
        // line 3
        if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "show_hero_header", array(0 => (isset($context["page"]) ? $context["page"] : null)), "method")) {
            // line 4
            echo " header--overlay header--dark
";
        } else {
            // line 6
            echo ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_theme", array()) == "dark")) ? ("header--dark") : (""));
            echo "
";
            // line 7
            echo ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_theme", array()) == "white")) ? ("header--white") : (""));
            echo "
";
            // line 8
            echo ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_theme", array()) == "standart")) ? ("header--brand") : (""));
            echo "
";
        }
        // line 10
        echo "\">
  <div class=\"container\">
    <div class=\"header__row\">
      <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("home_url")), "html", null, true);
        echo "\" class=\"header__logo\" title=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('bloginfo')->getCallable(), array("name")), "html", null, true);
        echo "\">
        ";
        // line 14
        $context["header_logo_type"] = $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_type", array());
        // line 15
        echo "
        ";
        // line 16
        if (((isset($context["header_logo_type"]) ? $context["header_logo_type"] : null) == "text")) {
            // line 17
            echo "          ";
            echo $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_text", array());
            echo "
        ";
        } elseif ((        // line 18
(isset($context["header_logo_type"]) ? $context["header_logo_type"] : null) == "image")) {
            // line 19
            echo "          ";
            if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "use_small_logo", array()) &&  !twig_test_empty($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_small", array())))) {
                // line 20
                echo "            <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_small", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('bloginfo')->getCallable(), array("name")), "html", null, true);
                echo "\">
          ";
            } else {
                // line 22
                echo "            <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('bloginfo')->getCallable(), array("name")), "html", null, true);
                echo "\">
          ";
            }
            // line 24
            echo "
        ";
        } elseif ((        // line 25
(isset($context["header_logo_type"]) ? $context["header_logo_type"] : null) == "svg")) {
            // line 26
            echo "
          ";
            // line 27
            if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "use_small_logo_svg", array()) &&  !twig_test_empty($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_small_svg", array())))) {
                // line 28
                echo "            ";
                echo $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_small_svg", array());
                echo "
          ";
            } else {
                // line 30
                echo "            ";
                echo $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "header_logo_svg", array());
                echo "
          ";
            }
            // line 32
            echo "
        ";
        } else {
            // line 34
            echo "          <svg>
            <use xlink:href=\"#icon-logo--mob\"></use>
          </svg>
        ";
        }
        // line 38
        echo "      </a>
      <div class=\"header__settings\">
        ";
        // line 40
        if ($this->getAttribute((isset($context["wpcurrency"]) ? $context["wpcurrency"] : null), "show_preheader_dropdown", array())) {
            // line 41
            echo "          <div class=\"header__settings-column\">
            <div class=\"dropdown dropdown--header\">
              <button data-toggle=\"dropdown\" type=\"button\" class=\"dropdown-toggle dropdown__btn\">
                <svg class=\"header__settings-icon\">
                  <use xlink:href=\"#icon-money\"></use>
                </svg>
                ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpcurrency"]) ? $context["wpcurrency"] : null), "active", array()), "html", null, true);
            echo "
              </button>
              <div class=\"dropdown__menu js-currency-switch\">
                <ul>
                  ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["wpcurrency"]) ? $context["wpcurrency"] : null), "enabled_list", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 52
                echo "                    <li class=\"dropdown__item\">
                      <a href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpcurrency"]) ? $context["wpcurrency"] : null), "switch_url", array(0 => $context["currency"]), "method"), "html", null, true);
                echo "\" class=\"dropdown__link\">";
                echo twig_escape_filter($this->env, $context["currency"], "html", null, true);
                echo "</a>
                    </li>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "                </ul>
              </div>
            </div>
          </div>
          <!-- end of block .header__settings-column-->
        ";
        }
        // line 62
        echo "

        ";
        // line 64
        if ($this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "show_preheader_control", array())) {
            // line 65
            echo "          ";
            $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("propertyAreaSwitcher", array("url" => $this->getAttribute(            // line 66
(isset($context["wparea"]) ? $context["wparea"] : null), "ajax_url", array()))));
            // line 68
            echo "          <div class=\"header__settings-column\">
            <div class=\"switch switch--header\">
              <label>";
            // line 70
            echo $this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "primary_label", array());
            echo "
                <input id=\"";
            // line 71
            echo twig_escape_filter($this->env, (isset($context["module_id"]) ? $context["module_id"] : null), "html", null, true);
            echo "\" type=\"checkbox\"
                    ";
            // line 72
            if ($this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "is_secondary_active", array())) {
                // line 73
                echo "                      checked
                    ";
            }
            // line 75
            echo "                    ";
            if ($this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "is_secondary_active", array())) {
                // line 76
                echo "                      value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "primary_value", array()), "html", null, true);
                echo "\"
                    ";
            } else {
                // line 78
                echo "                      value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "secondary_value", array()), "html", null, true);
                echo "\"
                    ";
            }
            // line 80
            echo "                >
                <span class=\"lever\"></span>";
            // line 81
            echo $this->getAttribute((isset($context["wparea"]) ? $context["wparea"] : null), "secondary_label", array());
            echo "
              </label>
            </div>
          </div>
          <!-- end of block .header__settings-column-->
        ";
        }
        // line 87
        echo "        ";
        if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_display_lang_choice", array())) {
            // line 88
            echo "          ";
            if (array_key_exists("wpglt", $context)) {
                // line 89
                echo "            ";
                if (twig_length_filter($this->env, $this->getAttribute((isset($context["wpglt"]) ? $context["wpglt"] : null), "languages", array()))) {
                    // line 90
                    echo "              <div class=\"header__settings-column\">
                <div class=\"dropdown dropdown--header js-glt\">
                  <button data-toggle=\"dropdown\" type=\"button\" class=\"dropdown-toggle dropdown__btn\">
                    <svg class=\"header__settings-icon\">
                      <use xlink:href=\"#icon-earth\"></use>
                    </svg>
                    <span class=\"js-current-glt-lang notranslate\"></span>
                  </button>
                  <div class=\"dropdown__menu\">
                    <ul>
                      ";
                    // line 100
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["wpglt"]) ? $context["wpglt"] : null), "languages", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                        // line 101
                        echo "                        <li class=\"dropdown__item \">
                          ";
                        // line 102
                        echo twig_escape_filter($this->env, (isset($context["dd"]) ? $context["dd"] : null), "html", null, true);
                        echo "
                          <a data-lang=\"";
                        // line 103
                        echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "code", array()), "html", null, true);
                        echo "\" class=\"nturl notranslate ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "code", array()), "html", null, true);
                        echo " dropdown__link js-gtl-item\">
                            ";
                        // line 104
                        echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "name", array()), "html", null, true);
                        echo "
                          </a>
                        </li>
                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 108
                    echo "                    </ul>
                  </div>
                </div>
              </div>
              <!-- end of block .header__settings-column-->
            ";
                }
                // line 114
                echo "          ";
            } else {
                // line 115
                echo "            ";
                $context["languages"] = call_user_func_array($this->env->getFunction('wpml_languages')->getCallable(), array());
                // line 116
                echo "            ";
                if (twig_length_filter($this->env, (isset($context["languages"]) ? $context["languages"] : null))) {
                    // line 117
                    echo "              <div class=\"header__settings-column\">
                <div class=\"dropdown dropdown--header\">
                  <button data-toggle=\"dropdown\" type=\"button\" class=\"dropdown-toggle dropdown__btn\">
                    <svg class=\"header__settings-icon\">
                      <use xlink:href=\"#icon-earth\"></use>
                    </svg>
                    ";
                    // line 123
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                        // line 124
                        echo "                      ";
                        if ($this->getAttribute($context["lang"], "active", array())) {
                            // line 125
                            echo "                        ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "native_name", array()), "html", null, true);
                            echo "
                      ";
                        }
                        // line 127
                        echo "                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 128
                    echo "                  </button>
                  <div class=\"dropdown__menu\">
                    <ul>
                      ";
                    // line 131
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                        // line 132
                        echo "                        <li class=\"dropdown__item \">
                          <a href=\"";
                        // line 133
                        echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "url", array()), "html", null, true);
                        echo "\"
                             class=\"";
                        // line 134
                        if ($this->getAttribute($context["lang"], "active", array())) {
                            echo "active";
                        }
                        echo " dropdown__link\">
                            ";
                        // line 135
                        echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "native_name", array()), "html", null, true);
                        echo "
                          </a>
                        </li>
                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 139
                    echo "                    </ul>
                  </div>
                </div>
              </div>
              <!-- end of block .header__settings-column-->
            ";
                }
                // line 145
                echo "          ";
            }
            // line 146
            echo "        ";
        }
        // line 147
        echo "      </div>
      ";
        // line 148
        if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_phone", array())) {
            // line 149
            echo "        <div class=\"header__contacts ";
            if ($this->getAttribute((isset($context["header"]) ? $context["header"] : null), "social_profiles", array())) {
                echo " header__contacts--social ";
            }
            echo "\">
          <a href=\"tel:";
            // line 150
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_phone", array()), "html", null, true);
            echo "\" class=\"header__phone\">
            <svg class=\"header__phone-icon\">
              <use xlink:href=\"#icon-phone\"></use>
            </svg>
            <span class=\"header__span\">";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_phone", array()), "html", null, true);
            echo "</span>
          </a>
        </div>
      ";
        }
        // line 158
        echo "      ";
        if ($this->getAttribute((isset($context["header"]) ? $context["header"] : null), "social_profiles", array())) {
            // line 159
            echo "        <div class=\"header__social ";
            if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "preheader_phone", array())) {
                echo " header__social--contacts ";
            }
            echo "\">
          <div class=\"social social--header social--circles\">
            ";
            // line 161
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["header"]) ? $context["header"] : null), "social_profiles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
                // line 162
                echo "              <a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["service"], "link", array()), "esc_url"), "html", null, true);
                echo "\" class=\"social__item\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
                echo "\">
                ";
                // line 163
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "fa_icon", array(0 => $this->getAttribute($context["service"], "icon", array())), "method"), "html", null, true);
                echo "
              </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 166
            echo "          </div>
        </div>
      ";
        }
        // line 169
        echo "      <!-- end of block .header__contacts-->
      ";
        // line 170
        if ($this->getAttribute((isset($context["header"]) ? $context["header"] : null), "show_auth", array())) {
            // line 171
            echo "        ";
            if (call_user_func_array($this->env->getTest('activated')->getCallable(), array("optima-express/iHomefinder.php"))) {
                // line 172
                echo "          <div class=\"auth auth--header\">
            <a href=\"";
                // line 173
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "url", array(0 => "property-organizer-login"), "method"), "html", null, true);
                echo "\" class=\"auth__name\"> ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Organizer", "realtyspace")), "html", null, true);
                echo "</a>

          </div>

        ";
            } else {
                // line 178
                echo "          ";
                $this->loadTemplate("partials/auth.twig", "partials/header.twig", 178)->display($context);
                // line 179
                echo "
        ";
            }
            // line 181
            echo "      ";
        }
        // line 182
        echo "      <button type=\"button\" class=\"header__navbar-toggle js-navbar-toggle\">
        <svg class=\"header__navbar-show\">
          <use xlink:href=\"#icon-menu\"></use>
        </svg>
        <svg class=\"header__navbar-hide\">
          <use xlink:href=\"#icon-menu-close\"></use>
        </svg>
      </button>
      <!-- end of block .header__navbar-toggle-->
    </div>
  </div>
</header>
<!-- END HEADER-->
";
        // line 195
        $this->loadTemplate("partials/top-nav.twig", "partials/header.twig", 195)->display($context);
    }

    public function getTemplateName()
    {
        return "partials/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  466 => 195,  451 => 182,  448 => 181,  444 => 179,  441 => 178,  431 => 173,  428 => 172,  425 => 171,  423 => 170,  420 => 169,  415 => 166,  406 => 163,  399 => 162,  395 => 161,  387 => 159,  384 => 158,  377 => 154,  370 => 150,  363 => 149,  361 => 148,  358 => 147,  355 => 146,  352 => 145,  344 => 139,  334 => 135,  328 => 134,  324 => 133,  321 => 132,  317 => 131,  312 => 128,  306 => 127,  300 => 125,  297 => 124,  293 => 123,  285 => 117,  282 => 116,  279 => 115,  276 => 114,  268 => 108,  258 => 104,  252 => 103,  248 => 102,  245 => 101,  241 => 100,  229 => 90,  226 => 89,  223 => 88,  220 => 87,  211 => 81,  208 => 80,  202 => 78,  196 => 76,  193 => 75,  189 => 73,  187 => 72,  183 => 71,  179 => 70,  175 => 68,  173 => 66,  171 => 65,  169 => 64,  165 => 62,  157 => 56,  146 => 53,  143 => 52,  139 => 51,  132 => 47,  124 => 41,  122 => 40,  118 => 38,  112 => 34,  108 => 32,  102 => 30,  96 => 28,  94 => 27,  91 => 26,  89 => 25,  86 => 24,  78 => 22,  70 => 20,  67 => 19,  65 => 18,  60 => 17,  58 => 16,  55 => 15,  53 => 14,  47 => 13,  42 => 10,  37 => 8,  33 => 7,  29 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/header.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/partials/header.twig");
    }
}
