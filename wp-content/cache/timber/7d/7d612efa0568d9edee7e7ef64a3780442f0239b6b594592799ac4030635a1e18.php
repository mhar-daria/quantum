<?php

/* macro-widget-form.twig */
class __TwigTemplate_2b27b91e9ebe25272dde962c41d2b7317736cf1a60b532408ccc7c15d473db34 extends Twig_Template
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
        // line 7
        echo "
";
        // line 11
        echo "
";
        // line 18
        echo "
";
        // line 25
        echo "
";
        // line 32
        echo "
";
        // line 47
        echo "
";
        // line 54
        echo "
";
    }

    // line 1
    public function gettext_field($__field__ = null, $__label__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "  <p>
    <label for=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo ":</label>
    <input class=\"widefat\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\" type=\"text\" value=\"";
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array()), ", "), "html", null, true);
            echo "\">
  </p>
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

    // line 8
    public function gethidden_field($__field__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "varargs" => func_num_args() > 1 ? array_slice(func_get_args(), 1) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 9
            echo "  <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\" type=\"hidden\" value=\"";
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array()), ", "), "html", null, true);
            echo "\">
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
    public function getnumber_field($__field__ = null, $__label__ = null, $__min__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "min" => $__min__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 13
            echo "  <p>
    <label for=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo ":</label>
    <input id=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\" type=\"number\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array()), "html", null, true);
            echo "\" ";
            if ( !(null === (isset($context["min"]) ? $context["min"] : null))) {
                echo "min=\"";
                echo twig_escape_filter($this->env, (isset($context["min"]) ? $context["min"] : null), "html", null, true);
                echo "\"";
            }
            echo " size=\"1\"/>
  </p>
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

    // line 19
    public function getcheckbox_field($__field__ = null, $__label__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 20
            echo "  <p>
    <input class=\"checkbox\" type=\"checkbox\" ";
            // line 21
            echo (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array())) ? ("checked=\"checked\"") : (""));
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\"/>
    <label for=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo "</label>
  </p>
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

    // line 26
    public function getcheckbox_sort_field($__field__ = null, $__label__ = null, $__sort_value__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "sort_value" => $__sort_value__,
            "varargs" => func_num_args() > 3 ? array_slice(func_get_args(), 3) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 27
            echo "  <li data-sortable=\"";
            echo twig_escape_filter($this->env, (isset($context["sort_value"]) ? $context["sort_value"] : null), "html", null, true);
            echo "\">
    <input class=\"checkbox\" type=\"checkbox\" ";
            // line 28
            echo (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array())) ? ("checked=\"checked\"") : (""));
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\"/>
    <label for=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo "</label>
  </li>
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

    // line 33
    public function getselect_field($__field__ = null, $__label__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 34
            echo "  <p>
    <label for=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo ":</label>
    <select id=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\">
      ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 38
                echo "        <option
            ";
                // line 39
                if (($this->getAttribute($context["option"], "value", array()) === false)) {
                    echo "disabled=\"disabled\" ";
                } else {
                    echo " value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "value", array()), "html", null, true);
                    echo "\" ";
                }
                // line 40
                echo "            ";
                if (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array()) == $this->getAttribute($context["option"], "value", array()))) {
                    echo "selected=\"selected\"";
                }
                echo ">
          ";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "label", array()), "html", null, true);
                echo "
        </option>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "    </select>
  </p>
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

    // line 48
    public function gettextarea_field($__field__ = null, $__label__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 49
            echo "  <p>
    <label for=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo ":</label>
    <textarea class=\"widefat\" rows=\"16\" cols=\"20\" id=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array()), ", "), "html", null, true);
            echo "</textarea>
  </p>
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

    // line 55
    public function getmedia_field($__field__ = null, $__label__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "field" => $__field__,
            "label" => $__label__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 56
            echo "  <p>
    <label for=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()))) : ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array())))), "html", null, true);
            echo "</label>
    <br>
    <img id=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "-thumb\" src=\"";
            echo twig_escape_filter($this->env, Timber\ImageHelper::resize($this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "image_object", array()), "src", array()), "thumbnail"), "html", null, true);
            echo "\">
    <input name=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array()), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" class=\"widefat\" type=\"text\" size=\"36\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "value", array()), "html", null, true);
            echo "\"/>
    <input id=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "-btn\" style=\"margin-top: 5px\" class=\"button button-primary\" type=\"button\" value=\"Select\"/>
  </p>
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
        return "macro-widget-form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  419 => 61,  411 => 60,  405 => 59,  398 => 57,  395 => 56,  382 => 55,  360 => 51,  354 => 50,  351 => 49,  338 => 48,  321 => 44,  312 => 41,  305 => 40,  297 => 39,  294 => 38,  290 => 37,  284 => 36,  278 => 35,  275 => 34,  262 => 33,  242 => 29,  234 => 28,  229 => 27,  215 => 26,  195 => 22,  187 => 21,  184 => 20,  171 => 19,  143 => 15,  137 => 14,  134 => 13,  120 => 12,  98 => 9,  86 => 8,  64 => 4,  58 => 3,  55 => 2,  42 => 1,  37 => 54,  34 => 47,  31 => 32,  28 => 25,  25 => 18,  22 => 11,  19 => 7,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "macro-widget-form.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/macro-widget-form.twig");
    }
}
