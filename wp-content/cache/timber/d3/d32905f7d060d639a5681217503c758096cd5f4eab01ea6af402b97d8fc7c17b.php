<?php

/* macro.twig */
class __TwigTemplate_614820b5a8ea56fb0ea3e7de9c4bdd809cf18fe03c9c5a148c1717f8eaa883f8 extends Twig_Template
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
        // line 11
        echo "
";
        // line 19
        echo "
";
        // line 39
        echo "


    ";
        // line 76
        echo "

    ";
        // line 84
        echo "
    ";
        // line 90
        echo "
";
        // line 103
        echo "
";
        // line 111
        echo "
";
        // line 131
        echo "
";
        // line 140
        echo "

";
    }

    // line 1
    public function getthumbnail($__src__ = null, $__width__ = null, $__height__ = null, $__class__ = null, $__gallery_mode__ = false, $__alt__ = "")
    {
        $context = $this->env->mergeGlobals(array(
            "src" => $__src__,
            "width" => $__width__,
            "height" => $__height__,
            "class" => $__class__,
            "gallery_mode" => $__gallery_mode__,
            "alt" => $__alt__,
            "varargs" => func_num_args() > 6 ? array_slice(func_get_args(), 6) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "  <img ";
            if ((isset($context["gallery_mode"]) ? $context["gallery_mode"] : null)) {
                echo " data-thumbnail ";
            }
            echo " ";
            if ((isset($context["class"]) ? $context["class"] : null)) {
                echo "class=\"";
                echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : null), "html", null, true);
                echo "\"";
            }
            // line 3
            echo "      ";
            if ((isset($context["src"]) ? $context["src"] : null)) {
                // line 4
                echo "        src=\"";
                echo twig_escape_filter($this->env, Timber\ImageHelper::resize((isset($context["src"]) ? $context["src"] : null), (isset($context["width"]) ? $context["width"] : null), (isset($context["height"]) ? $context["height"] : null), "center"), "html", null, true);
                echo "\"
      ";
            } else {
                // line 6
                echo "        data-src=\"holder.js/";
                echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, (isset($context["height"]) ? $context["height"] : null), "html", null, true);
                echo "?auto=yes&text=&font=FontAwesome&size=auto\"
      ";
            }
            // line 8
            echo "      alt=\"";
            echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : null), "html_attr");
            echo "\"
  />
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

    // line 12
    public function getthumbnail_src($__src__ = null, $__width__ = null, $__height__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "src" => $__src__,
            "width" => $__width__,
            "height" => $__height__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 13
            if ((isset($context["src"]) ? $context["src"] : null)) {
                // line 14
                echo twig_escape_filter($this->env, Timber\ImageHelper::resize((isset($context["src"]) ? $context["src"] : null), (isset($context["width"]) ? $context["width"] : null), (isset($context["height"]) ? $context["height"] : null), "center"), "html", null, true);
            } else {
                // line 16
                echo twig_escape_filter($this->env, (((("holder.js/" . (isset($context["width"]) ? $context["width"] : null)) . "x") . (isset($context["height"]) ? $context["height"] : null)) . "?auto=yes&text=&font=FontAwesome&size=100"), "html", null, true);
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

    // line 20
    public function getwidget_header($__title__ = null, $__subtitle__ = null, $__modifier__ = null, $__btn__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "title" => $__title__,
            "subtitle" => $__subtitle__,
            "modifier" => $__modifier__,
            "btn" => $__btn__,
            "varargs" => func_num_args() > 4 ? array_slice(func_get_args(), 4) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 21
            echo "  <div class=\"widget__header\">
    ";
            // line 22
            if ((((isset($context["title"]) ? $context["title"] : null) || (isset($context["subtitle"]) ? $context["subtitle"] : null)) || (isset($context["btn"]) ? $context["btn"] : null))) {
                // line 23
                echo "      ";
                if ((isset($context["title"]) ? $context["title"] : null)) {
                    // line 24
                    echo "        ";
                    if (((isset($context["modifier"]) ? $context["modifier"] : null) == "sidebar")) {
                        // line 25
                        echo "          <h3 class=\"widget__title\">";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo "</h3>
        ";
                    } elseif (((                    // line 26
(isset($context["modifier"]) ? $context["modifier"] : null) == "footer") || ((isset($context["modifier"]) ? $context["modifier"] : null) == "main"))) {
                        // line 27
                        echo "          <h4 class=\"widget__title\">";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo "</h4>
        ";
                    } else {
                        // line 29
                        echo "          <h2 class=\"widget__title\">";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo "</h2>
        ";
                    }
                    // line 31
                    echo "      ";
                }
                // line 32
                echo "      ";
                if ((isset($context["subtitle"]) ? $context["subtitle"] : null)) {
                    // line 33
                    echo "        <h5 class=\"widget__headline\">";
                    echo (isset($context["subtitle"]) ? $context["subtitle"] : null);
                    echo "</h5>
      ";
                }
                // line 35
                echo "    ";
            }
            // line 36
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

    // line 42
    public function getpagination($__pagination__ = null, $__container__ = null, $__scroll__ = true)
    {
        $context = $this->env->mergeGlobals(array(
            "pagination" => $__pagination__,
            "container" => $__container__,
            "scroll" => $__scroll__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 43
            echo "      ";
            if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "pages", array())) {
                // line 44
                echo "        <div class=\"site__footer\">
          <nav class=\"listing__pagination\">
            <ul class=\"pagination-custom ";
                // line 46
                if ((isset($context["container"]) ? $context["container"] : null)) {
                    echo "js-dapi-pagination";
                }
                echo "\"
                ";
                // line 47
                if (((isset($context["container"]) ? $context["container"] : null) &&  !(isset($context["scroll"]) ? $context["scroll"] : null))) {
                    echo "data-scrolltop=\"false\"";
                }
                // line 48
                echo "                ";
                if ((isset($context["container"]) ? $context["container"] : null)) {
                    echo "data-target=\"";
                    echo twig_escape_filter($this->env, (isset($context["container"]) ? $context["container"] : null), "html", null, true);
                    echo "\"";
                }
                // line 49
                echo "            >
              ";
                // line 50
                if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "prev", array())) {
                    // line 51
                    echo "                <li class=\"";
                    echo (( !$this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "prev", array())) ? ("hide") : (""));
                    echo "\">
                  <a href=\"";
                    // line 52
                    echo twig_trim_filter($this->getAttribute($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "prev", array()), "link", array()), "/");
                    echo "\">
                    <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                    <span class=\"sr-only\">";
                    // line 54
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Previous", "realtyspace")), "html", null, true);
                    echo "</span>
                  </a>
                </li>
              ";
                }
                // line 58
                echo "              ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "pages", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    // line 59
                    echo "                <li ";
                    if ($this->getAttribute($context["page"], "current", array())) {
                        echo " class=\"active\" ";
                    }
                    echo ">
                  <a href=\"";
                    // line 60
                    echo twig_trim_filter($this->getAttribute($context["page"], "link", array()), "/");
                    echo "\">";
                    echo $this->getAttribute($context["page"], "title", array());
                    echo "</a>
                </li>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "              ";
                if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "next", array())) {
                    // line 64
                    echo "                <li class=\"";
                    echo (( !$this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "next", array())) ? ("hide") : (""));
                    echo "\">
                  <a href=\"";
                    // line 65
                    echo twig_trim_filter($this->getAttribute($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "next", array()), "link", array()), "/");
                    echo "\">
                    <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                    <span class=\"sr-only\">";
                    // line 67
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Next", "realtyspace")), "html", null, true);
                    echo "</span>
                  </a>
                </li>
              ";
                }
                // line 71
                echo "            </ul>
          </nav>
        </div>
      ";
            }
            // line 75
            echo "    ";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 78
    public function getlink_more($__link__ = null, $__text__ = null, $__js_class__ = null, $__attrs__ = array())
    {
        $context = $this->env->mergeGlobals(array(
            "link" => $__link__,
            "text" => $__text__,
            "js_class" => $__js_class__,
            "attrs" => $__attrs__,
            "varargs" => func_num_args() > 4 ? array_slice(func_get_args(), 4) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 79
            echo "      ";
            $context["macro"] = $this;
            // line 80
            echo "      <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
            echo "\" class=\"properties__btn-more ";
            echo twig_escape_filter($this->env, (isset($context["js_class"]) ? $context["js_class"] : null), "html", null, true);
            echo "\" ";
            echo $context["macro"]->getattrs((isset($context["attrs"]) ? $context["attrs"] : null));
            echo ">
        ";
            // line 81
            echo twig_escape_filter($this->env, (isset($context["text"]) ? $context["text"] : null), "html", null, true);
            echo "
      </a>
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

    // line 85
    public function getattrs($__attributes__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "attributes" => $__attributes__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 86
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attr_name"] => $context["attr_value"]) {
                // line 87
                echo "        ";
                echo twig_escape_filter($this->env, $context["attr_name"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attr_value"], "html", null, true);
                echo "\"
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attr_name'], $context['attr_value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "    ";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 91
    public function geticon($__name__ = null, $__classes__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "classes" => $__classes__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 92
            echo "  ";
            $context["__internal_63805cb33f2c48940413749ff474088c1b5bd9b70ecf873b8be0098378ea3c82"] = $this;
            // line 93
            echo "  ";
            if ((is_string($__internal_4e0c6faaf64a2175d867bb0b586dd4c919e019bf32751b8c00c5c41779f71159 = (isset($context["name"]) ? $context["name"] : null)) && is_string($__internal_b8665d0d20d706c9342d00ba34408de11f5cfce4f28916a8383461320ed4276f = "fa-") && ('' === $__internal_b8665d0d20d706c9342d00ba34408de11f5cfce4f28916a8383461320ed4276f || 0 === strpos($__internal_4e0c6faaf64a2175d867bb0b586dd4c919e019bf32751b8c00c5c41779f71159, $__internal_b8665d0d20d706c9342d00ba34408de11f5cfce4f28916a8383461320ed4276f)))) {
                // line 94
                echo "    ";
                echo $context["__internal_63805cb33f2c48940413749ff474088c1b5bd9b70ecf873b8be0098378ea3c82"]->getfa_icon((isset($context["name"]) ? $context["name"] : null), (isset($context["classes"]) ? $context["classes"] : null));
                echo "
  ";
            } elseif ((is_string($__internal_409bb7487e2484f67d953fa27cb9f9c576e327af444db16da9742361b4420aa4 =             // line 95
(isset($context["name"]) ? $context["name"] : null)) && is_string($__internal_9dae190a42937055568e33546c79e7d833bf7338557043ca4bd884bfacf8abcf = "icon-") && ('' === $__internal_9dae190a42937055568e33546c79e7d833bf7338557043ca4bd884bfacf8abcf || 0 === strpos($__internal_409bb7487e2484f67d953fa27cb9f9c576e327af444db16da9742361b4420aa4, $__internal_9dae190a42937055568e33546c79e7d833bf7338557043ca4bd884bfacf8abcf)))) {
                // line 96
                echo "    <svg class=\"";
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html_attr");
                echo "\">
      <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#";
                // line 97
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html_attr");
                echo "\"></use>
    </svg>
  ";
            } else {
                // line 100
                echo "    <i class=\"";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html_attr");
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html_attr");
                echo "\"></i>
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

    // line 104
    public function getfa_icon($__name__ = null, $__classes__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "classes" => $__classes__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 105
            echo "  ";
            if ((is_string($__internal_6c3e25f5c6be71342f8e41af63dab4593fc891cefe127e1d0db77fa3e2009846 = (isset($context["name"]) ? $context["name"] : null)) && is_string($__internal_151efdfb69a79c48993896588854e3519f43098774b14af995fde2cc74935b92 = "fa-") && ('' === $__internal_151efdfb69a79c48993896588854e3519f43098774b14af995fde2cc74935b92 || 0 === strpos($__internal_6c3e25f5c6be71342f8e41af63dab4593fc891cefe127e1d0db77fa3e2009846, $__internal_151efdfb69a79c48993896588854e3519f43098774b14af995fde2cc74935b92)))) {
                // line 106
                echo "    <i class=\"fa ";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html_attr");
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html_attr");
                echo "\"></i>
  ";
            } else {
                // line 108
                echo "    <i class=\"fa fa-";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html_attr");
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html_attr");
                echo "\"></i>
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

    // line 112
    public function getpage_header($__page__ = null, $__show_panel__ = true)
    {
        $context = $this->env->mergeGlobals(array(
            "page" => $__page__,
            "show_panel" => $__show_panel__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 113
            echo "  <header class=\"site__header\">
    ";
            // line 114
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title", array())) {
                // line 115
                echo "      <h1 class=\"site__title ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('preview_hook')->getCallable(), array("js-archive-title")), "html", null, true);
                echo "\">";
                // line 116
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title", array());
                // line 117
                echo "</h1>
    ";
            }
            // line 119
            echo "    ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "subtitle", array())) {
                // line 120
                echo "      <h5 class=\"site__headline ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('preview_hook')->getCallable(), array("js-archive-subtitle")), "html", null, true);
                echo "\">";
                // line 121
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "subtitle", array()), "html", null, true);
                // line 122
                echo "</h5>
    ";
            }
            // line 124
            echo "  </header>
  ";
            // line 125
            if ((isset($context["show_panel"]) ? $context["show_panel"] : null)) {
                // line 126
                echo "    <div class=\"site__panel ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('preview_hook')->getCallable(), array("js-archive-panel")), "html", null, true);
                echo "\">";
                // line 127
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "panel", array());
                // line 128
                echo "</div>
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

    // line 132
    public function getsharing_links($__links__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "links" => $__links__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 133
            echo "  ";
            $context["__internal_9f231e073c4f92d9468ed3bea324e4099282aa8338049e33356e1fa3d0305639"] = $this;
            // line 134
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
            foreach ($context['_seq'] as $context["icon"] => $context["link"]) {
                // line 135
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $context["link"], "html", null, true);
                echo "\" target=\"_blank\" class=\"social__item\">
      ";
                // line 136
                echo $context["__internal_9f231e073c4f92d9468ed3bea324e4099282aa8338049e33356e1fa3d0305639"]->getfa_icon($context["icon"]);
                echo "
    </a>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['icon'], $context['link'], $context['_parent'], $context['loop']);
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

    // line 142
    public function getno_items_available($__text__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $__text__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 143
            echo "  <div class=\"no-items\">
    <div class=\"no-items__icon no-items__icon--svg\">
      <svg>
        <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-noitems\"></use>
      </svg>
    </div>
    <span class=\"no-items__title\">";
            // line 149
            echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? (_twig_default_filter((isset($context["text"]) ? $context["text"] : null), call_user_func_array($this->env->getFunction('__')->getCallable(), array("No items", "realtyspace")))) : (call_user_func_array($this->env->getFunction('__')->getCallable(), array("No items", "realtyspace")))), "html", null, true);
            echo "</span>
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
        return "macro.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  682 => 149,  674 => 143,  662 => 142,  640 => 136,  635 => 135,  630 => 134,  627 => 133,  615 => 132,  598 => 128,  596 => 127,  592 => 126,  590 => 125,  587 => 124,  583 => 122,  581 => 121,  577 => 120,  574 => 119,  570 => 117,  568 => 116,  564 => 115,  562 => 114,  559 => 113,  546 => 112,  525 => 108,  517 => 106,  514 => 105,  501 => 104,  480 => 100,  474 => 97,  469 => 96,  467 => 95,  462 => 94,  459 => 93,  456 => 92,  443 => 91,  428 => 89,  417 => 87,  412 => 86,  400 => 85,  382 => 81,  373 => 80,  370 => 79,  355 => 78,  340 => 75,  334 => 71,  327 => 67,  322 => 65,  317 => 64,  314 => 63,  303 => 60,  296 => 59,  291 => 58,  284 => 54,  279 => 52,  274 => 51,  272 => 50,  269 => 49,  262 => 48,  258 => 47,  252 => 46,  248 => 44,  245 => 43,  231 => 42,  214 => 36,  211 => 35,  205 => 33,  202 => 32,  199 => 31,  193 => 29,  187 => 27,  185 => 26,  180 => 25,  177 => 24,  174 => 23,  172 => 22,  169 => 21,  154 => 20,  138 => 16,  135 => 14,  133 => 13,  119 => 12,  100 => 8,  92 => 6,  86 => 4,  83 => 3,  72 => 2,  55 => 1,  49 => 140,  46 => 131,  43 => 111,  40 => 103,  37 => 90,  34 => 84,  30 => 76,  25 => 39,  22 => 19,  19 => 11,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% macro thumbnail(src, width, height = null, class = null, gallery_mode = false, alt='') %}
  <img {% if gallery_mode %} data-thumbnail {% endif %} {% if class %}class=\"{{ class }}\"{% endif %}
      {% if src %}
        src=\"{{ src|resize(width, height, 'center') }}\"
      {% else %}
        data-src=\"holder.js/{{ width }}x{{ height }}?auto=yes&text=&font=FontAwesome&size=auto\"
      {% endif %}
      alt=\"{{ alt|e('html_attr') }}\"
  />
{% endmacro %}

{% macro thumbnail_src(src, width, height = null) %}
  {%- if src -%}
    {{- src|resize(width, height, 'center') -}}
  {%- else -%}
    {{- \"holder.js/#{width}x#{height}?auto=yes&text=&font=FontAwesome&size=100\" -}}
  {%- endif -%}
{% endmacro %}

{% macro widget_header(title, subtitle, modifier, btn) %}
  <div class=\"widget__header\">
    {% if title or subtitle or btn %}
      {% if title %}
        {% if modifier == 'sidebar' %}
          <h3 class=\"widget__title\">{{ title|raw }}</h3>
        {% elseif modifier == 'footer' or modifier == 'main' %}
          <h4 class=\"widget__title\">{{ title|raw }}</h4>
        {% else %}
          <h2 class=\"widget__title\">{{ title|raw }}</h2>
        {% endif %}
      {% endif %}
      {% if subtitle %}
        <h5 class=\"widget__headline\">{{ subtitle|raw }}</h5>
      {% endif %}
    {% endif %}
  </div>

{% endmacro %}



    {% macro pagination(pagination, container = null, scroll = true) %}
      {% if pagination.pages %}
        <div class=\"site__footer\">
          <nav class=\"listing__pagination\">
            <ul class=\"pagination-custom {% if container %}js-dapi-pagination{% endif %}\"
                {% if container and not scroll %}data-scrolltop=\"false\"{% endif %}
                {% if container %}data-target=\"{{ container }}\"{% endif %}
            >
              {% if pagination.prev %}
                <li class=\"{{ not pagination.prev ? 'hide' }}\">
                  <a href=\"{{ pagination.prev.link|trim('/')|raw }}\">
                    <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-left\"></span>
                    <span class=\"sr-only\">{{ __('Previous', 'realtyspace') }}</span>
                  </a>
                </li>
              {% endif %}
              {% for page in pagination.pages %}
                <li {% if page.current %} class=\"active\" {% endif %}>
                  <a href=\"{{ page.link|trim('/')|raw }}\">{{ page.title|raw }}</a>
                </li>
              {% endfor %}
              {% if pagination.next %}
                <li class=\"{{ not pagination.next ? 'hide' }}\">
                  <a href=\"{{ pagination.next.link|trim('/')|raw }}\">
                    <span aria-hidden=\"true\" class=\"glyphicon glyphicon-chevron-right\"></span>
                    <span class=\"sr-only\">{{ __('Next', 'realtyspace') }}</span>
                  </a>
                </li>
              {% endif %}
            </ul>
          </nav>
        </div>
      {% endif %}
    {% endmacro %}


    {% macro link_more(link, text, js_class, attrs = {}) %}
      {% import _self as macro %}
      <a href=\"{{ link }}\" class=\"properties__btn-more {{ js_class }}\" {{ macro.attrs(attrs) }}>
        {{ text }}
      </a>
    {% endmacro %}

    {% macro attrs(attributes) %}
      {% for attr_name, attr_value in attributes %}
        {{ attr_name }}=\"{{ attr_value }}\"
      {% endfor %}
    {% endmacro %}

{% macro icon(name, classes) %}
  {% from _self import fa_icon %}
  {% if name starts with 'fa-' %}
    {{ fa_icon(name, classes) }}
  {% elseif name starts with 'icon-' %}
    <svg class=\"{{ classes|e('html_attr') }}\">
      <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#{{ name|e('html_attr') }}\"></use>
    </svg>
  {% else %}
    <i class=\"{{ name|e('html_attr') }} {{ classes|e('html_attr') }}\"></i>
  {% endif %}
{% endmacro %}

{% macro fa_icon(name, classes) %}
  {% if name starts with 'fa-' %}
    <i class=\"fa {{ name|e('html_attr') }} {{ classes|e('html_attr') }}\"></i>
  {% else %}
    <i class=\"fa fa-{{ name|e('html_attr') }} {{ classes|e('html_attr') }}\"></i>
  {% endif %}
{% endmacro %}

{% macro page_header(page, show_panel = true) %}
  <header class=\"site__header\">
    {% if page.title %}
      <h1 class=\"site__title {{ preview_hook('js-archive-title') }}\">
        {{- page.title|raw -}}
      </h1>
    {% endif %}
    {% if page.subtitle %}
      <h5 class=\"site__headline {{ preview_hook('js-archive-subtitle') }}\">
        {{- page.subtitle -}}
      </h5>
    {% endif %}
  </header>
  {% if show_panel %}
    <div class=\"site__panel {{ preview_hook('js-archive-panel') }}\">
      {{- page.panel|raw -}}
    </div>
  {% endif %}
{% endmacro %}

{% macro sharing_links(links) %}
  {% from _self import fa_icon %}
  {% for icon,link in links %}
    <a href=\"{{ link }}\" target=\"_blank\" class=\"social__item\">
      {{ fa_icon(icon) }}
    </a>
  {% endfor %}
{% endmacro %}


{% macro no_items_available(text) %}
  <div class=\"no-items\">
    <div class=\"no-items__icon no-items__icon--svg\">
      <svg>
        <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-noitems\"></use>
      </svg>
    </div>
    <span class=\"no-items__title\">{{ text|default(__('No items', 'realtyspace')) }}</span>
  </div>
{% endmacro %}", "macro.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/macro.twig");
    }
}
