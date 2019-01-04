<?php

/* modules/core/form-themes/global.twig */
class __TwigTemplate_1db1d6979b7997df6d6a51138378fad742daf22db1e6cf16a3373ecccfa2f2b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("bootstrap_3_layout.html.twig", "modules/core/form-themes/global.twig", 1);
        $this->blocks = array(
            'form_start' => array($this, 'block_form_start'),
            'form_label' => array($this, 'block_form_label'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'radio_label' => array($this, 'block_radio_label'),
            'checkbox_label' => array($this, 'block_checkbox_label'),
            'radio_widget' => array($this, 'block_radio_widget'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'honeypot_row' => array($this, 'block_honeypot_row'),
            'form_row' => array($this, 'block_form_row'),
            'rangeslider_widget' => array($this, 'block_rangeslider_widget'),
            'dropzone_widget' => array($this, 'block_dropzone_widget'),
            'image_widget' => array($this, 'block_image_widget'),
            'map_widget' => array($this, 'block_map_widget'),
            'dynamic_row_widget' => array($this, 'block_dynamic_row_widget'),
            'dynamic_row_name_value_row' => array($this, 'block_dynamic_row_name_value_row'),
            'dynamic_row_name_value_label' => array($this, 'block_dynamic_row_name_value_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "bootstrap_3_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_form_start($context, array $blocks = array())
    {
        // line 4
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")))));
        // line 5
        echo "  ";
        $context["method"] = twig_upper_filter($this->env, (isset($context["method"]) ? $context["method"] : null));
        // line 6
        if (twig_in_filter((isset($context["method"]) ? $context["method"] : null), array(0 => "GET", 1 => "POST"))) {
            // line 7
            $context["form_method"] = (isset($context["method"]) ? $context["method"] : null);
        } else {
            // line 9
            $context["form_method"] = "POST";
        }
        // line 11
        echo "<form ";
        if ((isset($context["name"]) ? $context["name"] : null)) {
            echo "name=\"";
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\"";
        }
        echo " method=\"";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["form_method"]) ? $context["form_method"] : null)), "html", null, true);
        echo "\" action=\"";
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\"";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        if ((isset($context["multipart"]) ? $context["multipart"] : null)) {
            echo " enctype=\"multipart/form-data\"";
        }
        echo ">";
        // line 12
        if (((isset($context["form_method"]) ? $context["form_method"] : null) != (isset($context["method"]) ? $context["method"] : null))) {
            // line 13
            echo "<input type=\"hidden\" name=\"_method\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["method"]) ? $context["method"] : null), "html", null, true);
            echo "\"/>";
        }
    }

    // line 17
    public function block_form_label($context, array $blocks = array())
    {
        // line 18
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " control-label"))));
        // line 19
        echo "
  ";
        // line 20
        if ( !((isset($context["label"]) ? $context["label"] : null) === false)) {
            // line 21
            if ( !(isset($context["compound"]) ? $context["compound"] : null)) {
                // line 22
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("for" => (isset($context["id"]) ? $context["id"] : null)));
            }
            // line 24
            if ((isset($context["required"]) ? $context["required"] : null)) {
                // line 25
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " required"))));
            }
            // line 27
            if (twig_test_empty((isset($context["label"]) ? $context["label"] : null))) {
                // line 28
                if ( !twig_test_empty((isset($context["label_format"]) ? $context["label_format"] : null))) {
                    // line 29
                    $context["label"] = twig_replace_filter((isset($context["label_format"]) ? $context["label_format"] : null), array("%name%" =>                     // line 30
(isset($context["name"]) ? $context["name"] : null), "%id%" =>                     // line 31
(isset($context["id"]) ? $context["id"] : null)));
                } else {
                    // line 34
                    $context["label"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->humanize((isset($context["name"]) ? $context["name"] : null));
                }
            }
            // line 37
            echo "<label";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : null));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo (isset($context["label"]) ? $context["label"] : null);
            echo "</label>";
        }
        // line 40
        if ((isset($context["description"]) ? $context["description"] : null)) {
            // line 41
            echo "    <h5>";
            echo twig_escape_filter($this->env, (isset($context["description"]) ? $context["description"] : null), "html", null, true);
            echo "</h5>
  ";
        }
    }

    // line 47
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 48
        if (( !array_key_exists("type", $context) || ("file" != (isset($context["type"]) ? $context["type"] : null)))) {
            // line 49
            echo "    ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")))));
            // line 50
            echo "  ";
        }
        // line 51
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
    }

    // line 55
    public function block_radio_label($context, array $blocks = array())
    {
        // line 56
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " in-label"))));
        // line 57
        if (twig_in_filter("standalone", $this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()))) {
            // line 58
            echo "    ";
            $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " control-label"))));
        }
        // line 60
        echo "  ";
        if ( !((isset($context["label"]) ? $context["label"] : null) === false)) {
            // line 61
            if ( !(isset($context["compound"]) ? $context["compound"] : null)) {
                // line 62
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("for" => (isset($context["id"]) ? $context["id"] : null)));
            }
            // line 64
            if ((isset($context["required"]) ? $context["required"] : null)) {
                // line 65
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " required"))));
            }
            // line 67
            if (twig_test_empty((isset($context["label"]) ? $context["label"] : null))) {
                // line 68
                if ( !twig_test_empty((isset($context["label_format"]) ? $context["label_format"] : null))) {
                    // line 69
                    $context["label"] = twig_replace_filter((isset($context["label_format"]) ? $context["label_format"] : null), array("%name%" =>                     // line 70
(isset($context["name"]) ? $context["name"] : null), "%id%" =>                     // line 71
(isset($context["id"]) ? $context["id"] : null)));
                } else {
                    // line 74
                    $context["label"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->humanize((isset($context["name"]) ? $context["name"] : null));
                }
            }
            // line 77
            echo "<label";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : null));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo twig_escape_filter($this->env, ((((isset($context["translation_domain"]) ? $context["translation_domain"] : null) === false)) ? ((isset($context["label"]) ? $context["label"] : null)) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans((isset($context["label"]) ? $context["label"] : null), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)))), "html", null, true);
            echo "</label>";
        }
    }

    // line 81
    public function block_checkbox_label($context, array $blocks = array())
    {
        // line 83
        echo "    ";
        // line 84
        echo "    ";
        // line 85
        echo "      ";
        $this->displayBlock("radio_label", $context, $blocks);
        echo "
  ";
    }

    // line 90
    public function block_radio_widget($context, array $blocks = array())
    {
        // line 91
        echo "  ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " in-radio"))));
        // line 92
        echo "<input type=\"radio\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "\"";
        }
        if ((isset($context["checked"]) ? $context["checked"] : null)) {
            echo " checked=\"checked\"";
        }
        echo " />
";
    }

    // line 95
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 96
        echo "  ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " in-checkbox"))));
        // line 97
        echo "<input type=\"checkbox\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "\"";
        }
        if ((isset($context["checked"]) ? $context["checked"] : null)) {
            echo " checked=\"checked\"";
        }
        echo " />
  ";
        // line 98
        if (twig_in_filter("standalone", $this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()))) {
            // line 99
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)));
        }
    }

    // line 121
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 122
        if ( !(isset($context["as_dropdown"]) ? $context["as_dropdown"] : null)) {
            // line 123
            echo "    <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 124
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 125
                echo "        <div>";
                // line 126
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget');
                // line 127
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'label');
                // line 128
                echo "</div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 130
            echo "</div>
  ";
        } else {
            // line 132
            echo "

    ";
            // line 134
            $context["__internal_01585aadd5af1fe1e36279b79c12d7d74cf7f82edeee92e87de2073411bc7bbc"] = $this;
            // line 135
            echo "
    ";
            // line 136
            $context["arr"] = array();
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 138
                echo "      ";
                ob_start();
                // line 139
                echo "        ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget', array("is_choice" => true));
                echo "
        ";
                // line 140
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'label', array("is_choice" => true, "label_attr" => array("class" => "in-label", "data-toggle" => "tooltip", "data-placement" => "top", "title" => $this->getAttribute($this->getAttribute(                // line 146
$context["child"], "vars", array()), "label", array()))));
                // line 148
                echo "
      ";
                $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 150
                echo "      ";
                $context["arr"] = twig_array_merge((isset($context["arr"]) ? $context["arr"] : null), array(("el" . $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "value", array())) => (isset($context["html"]) ? $context["html"] : null)));
                // line 151
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "

    <div class=\"dropdown dropdown--select\" ";
            // line 154
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
      <button type=\"button\" data-toggle=\"dropdown\" data-placeholder=\"";
            // line 155
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Any", "realtyspace")), "html", null, true);
            echo "\"
              class=\"dropdown-toggle js-select-checkboxes-btn\">
        ";
            // line 157
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Any", "realtyspace")), "html", null, true);
            echo "
      </button>

      <div class=\"dropdown-menu js-dropdown-menu js-select-checkboxes\">
        <div class=\"dropdown__content\">
          ";
            // line 162
            if ((isset($context["list_indent"]) ? $context["list_indent"] : null)) {
                // line 163
                echo "
            <div class=\"region-select\">
              ";
                // line 165
                echo $context["__internal_01585aadd5af1fe1e36279b79c12d7d74cf7f82edeee92e87de2073411bc7bbc"]->getrender_tree((isset($context["list_indent"]) ? $context["list_indent"] : null), (isset($context["arr"]) ? $context["arr"] : null));
                echo "
            </div>
          ";
            } else {
                // line 168
                echo "            <ul class=\"dropdown__list\">
              ";
                // line 169
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["arr"]) ? $context["arr"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 170
                    echo "                <li>
                  ";
                    // line 171
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "
                </li>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 174
                echo "            </ul>
          ";
            }
            // line 176
            echo "        </div>

        <div class=\"dropdown__buttons\">
          <button type=\"button\" class=\"btn--default btn--default--reset js-select-checkboxes-reset\">";
            // line 179
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Clear", "realtyspace")), "html", null, true);
            echo "</button>
          <button type=\"button\" class=\"btn--default js-select-checkboxes-accept\">";
            // line 180
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Accept", "realtyspace")), "html", null, true);
            echo "</button>
        </div>
      </div>
    </div>
  ";
        }
    }

    // line 188
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 189
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")))));
        // line 190
        $this->displayParentBlock("textarea_widget", $context, $blocks);
    }

    // line 193
    public function block_honeypot_row($context, array $blocks = array())
    {
        // line 194
        echo "  ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
";
    }

    // line 197
    public function block_form_row($context, array $blocks = array())
    {
        // line 198
        echo "<div class=\"form-group";
        if ((( !(isset($context["compound"]) ? $context["compound"] : null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter((isset($context["force_error"]) ? $context["force_error"] : null), false)) : (false))) &&  !(isset($context["valid"]) ? $context["valid"] : null))) {
            echo " has-error";
        }
        echo " ";
        echo twig_escape_filter($this->env, ((array_key_exists("row_class", $context)) ? (_twig_default_filter((isset($context["row_class"]) ? $context["row_class"] : null), "")) : ("")), "html", null, true);
        echo " ";
        echo (((isset($context["required"]) ? $context["required"] : null)) ? ("required") : (""));
        echo "\">
    ";
        // line 199
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
    ";
        // line 200
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
    ";
        // line 201
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
  </div>";
    }

    // line 205
    public function block_rangeslider_widget($context, array $blocks = array())
    {
        // line 206
        echo "  <div class=\"form__mode\">

    ";
        // line 208
        $context["range"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("Range", "realtyspace"));
        // line 209
        echo "    ";
        $context["from"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("From", "realtyspace"));
        // line 210
        echo "    ";
        $context["to"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("To", "realtyspace"));
        // line 211
        echo "
    <button type=\"button\" data-mode=\"input\" class=\"form__mode-btn js-input-mode\" data-toggle-value=\"";
        // line 212
        echo twig_escape_filter($this->env, (isset($context["range"]) ? $context["range"] : null), "html", null, true);
        echo "\">
      ";
        // line 213
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Input", "realtyspace")), "html", null, true);
        echo "
    </button>
  </div>
  <div class=\"form__ranges\">";
        // line 217
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : null), "text")) : ("text"));
        // line 218
        $context["class"] = " js-form-range form__ranges-in";
        // line 219
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . (isset($context["class"]) ? $context["class"] : null)))));
        // line 220
        echo "    ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
  </div>
  <div class=\"form__inputs \" data-form-ranges>
    <input type=\"text\" placeholder=\"";
        // line 223
        echo twig_escape_filter($this->env, (isset($context["from"]) ? $context["from"] : null), "html", null, true);
        echo "\" data-form-field data-field-type=\"from\" class=\"form-control\">
    <input type=\"text\" placeholder=\"";
        // line 224
        echo twig_escape_filter($this->env, (isset($context["to"]) ? $context["to"] : null), "html", null, true);
        echo "\" data-form-field data-field-type=\"to\" class=\"form-control\">
  </div>
";
    }

    // line 229
    public function block_dropzone_widget($context, array $blocks = array())
    {
        // line 230
        echo "  ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute(        // line 231
(isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " dropzone dropzone--submit form__dropzone"))));
        // line 233
        echo "  ";
        $this->displayBlock("collection_widget", $context, $blocks);
        echo "
";
    }

    // line 236
    public function block_image_widget($context, array $blocks = array())
    {
        // line 237
        echo "  ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
";
    }

    // line 240
    public function block_map_widget($context, array $blocks = array())
    {
        // line 241
        echo "  ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute(        // line 242
(isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " map js-dapi-loc-gmap"))));
        // line 244
        echo "  <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 245
        if (twig_test_empty($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()))) {
            // line 246
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        }
        // line 248
        echo "<div class=\"row map__autocomplete\">
      ";
        // line 249
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "address", array()), 'widget', array("attr" => array("class" => "form-control--autocomplete")));
        // line 251
        $this->displayBlock("form_rows", $context, $blocks);
        // line 252
        echo "<div class=\"map__buttons\">
        <button data-map-button type=\"button\" class=\"map__change-map js-map-btn\">";
        // line 253
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Address Map", "realtyspace")), "html", null, true);
        echo "</button>
      </div>
      <button type=\"button\" class=\"map__geolocation js-geolocate\">
        <svg>
          <use xlink:href=\"#icon-geolocation\"></use>
        </svg>
      </button>
    </div>
    <div class=\"map__wrap\">
      <div data-map data-map-canvas class=\"map__view map__view--property-form js-map-canvas\"></div>
    </div>";
        // line 264
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        // line 265
        echo "</div>

";
    }

    // line 269
    public function block_dynamic_row_widget($context, array $blocks = array())
    {
        // line 270
        echo "  ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => twig_trim_filter(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form__dynamic-row js-dapi-dynarow"))));
        // line 271
        echo "  ";
        $this->displayBlock("collection_widget", $context, $blocks);
        echo "
";
    }

    // line 274
    public function block_dynamic_row_name_value_row($context, array $blocks = array())
    {
        // line 275
        echo "  <div class=\"row\" data-row>
    ";
        // line 276
        $context["row_class"] = "form__dynamic-group";
        // line 277
        echo "    ";
        $this->displayBlock("form_row", $context, $blocks);
        echo "
    ";
        // line 278
        $context["total_items"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "children", array()));
        // line 279
        echo "    ";
        $context["current_item"] = ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "name", array()) + 1);
        // line 280
        echo "    <div class=\"form-group form__dynamic-buttons\">
      <button type=\"button\" data-remove-row class=\"btn--minus\"></button>
      <button type=\"button\" class=\"btn--plus\" data-add-row
              ";
        // line 283
        if ((((isset($context["current_item"]) ? $context["current_item"] : null) != (isset($context["total_items"]) ? $context["total_items"] : null)) &&  !array_key_exists("prototype", $context))) {
            echo "class=\"hide\"";
        }
        // line 284
        echo "      >
      </button>

    </div>
  </div>
";
    }

    // line 291
    public function block_dynamic_row_name_value_label($context, array $blocks = array())
    {
    }

    // line 105
    public function getrender_tree($__options__ = null, $__arr__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "options" => $__options__,
            "arr" => $__arr__,
            "varargs" => func_num_args() > 2 ? array_slice(func_get_args(), 2) : array(),
        ));

        $blocks = array();

        ob_start();
        try {
            // line 106
            echo "  ";
            $context["__internal_96171b26d0d763939fae31f1f79220bcd4bf32c474616a7df4c79bb742299b87"] = $this;
            // line 107
            echo "  <ul class=\"bonsai region-list js-tree\">
    ";
            // line 108
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 109
                echo "      <li>
        ";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["arr"]) ? $context["arr"] : null), ("el" . $this->getAttribute($context["option"], "term_id", array()))), "html", null, true);
                echo "
        ";
                // line 111
                if ( !twig_test_empty($this->getAttribute($context["option"], "children", array()))) {
                    // line 112
                    echo "          ";
                    echo $context["__internal_96171b26d0d763939fae31f1f79220bcd4bf32c474616a7df4c79bb742299b87"]->getrender_tree($this->getAttribute($context["option"], "children", array()), (isset($context["arr"]) ? $context["arr"] : null));
                    echo "
        ";
                }
                // line 114
                echo "      </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "
  </ul>
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
        return "modules/core/form-themes/global.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  706 => 116,  699 => 114,  693 => 112,  691 => 111,  687 => 110,  684 => 109,  680 => 108,  677 => 107,  674 => 106,  661 => 105,  656 => 291,  647 => 284,  643 => 283,  638 => 280,  635 => 279,  633 => 278,  628 => 277,  626 => 276,  623 => 275,  620 => 274,  613 => 271,  610 => 270,  607 => 269,  601 => 265,  599 => 264,  586 => 253,  583 => 252,  581 => 251,  579 => 249,  576 => 248,  573 => 246,  571 => 245,  567 => 244,  565 => 242,  563 => 241,  560 => 240,  553 => 237,  550 => 236,  543 => 233,  541 => 231,  539 => 230,  536 => 229,  529 => 224,  525 => 223,  518 => 220,  515 => 219,  513 => 218,  511 => 217,  505 => 213,  501 => 212,  498 => 211,  495 => 210,  492 => 209,  490 => 208,  486 => 206,  483 => 205,  477 => 201,  473 => 200,  469 => 199,  458 => 198,  455 => 197,  448 => 194,  445 => 193,  441 => 190,  439 => 189,  436 => 188,  426 => 180,  422 => 179,  417 => 176,  413 => 174,  404 => 171,  401 => 170,  397 => 169,  394 => 168,  388 => 165,  384 => 163,  382 => 162,  374 => 157,  369 => 155,  365 => 154,  361 => 152,  355 => 151,  352 => 150,  348 => 148,  346 => 146,  345 => 140,  340 => 139,  337 => 138,  333 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  318 => 130,  311 => 128,  309 => 127,  307 => 126,  305 => 125,  301 => 124,  297 => 123,  295 => 122,  292 => 121,  287 => 99,  285 => 98,  272 => 97,  269 => 96,  266 => 95,  251 => 92,  248 => 91,  245 => 90,  238 => 85,  236 => 84,  234 => 83,  231 => 81,  211 => 77,  207 => 74,  204 => 71,  203 => 70,  202 => 69,  200 => 68,  198 => 67,  195 => 65,  193 => 64,  190 => 62,  188 => 61,  185 => 60,  181 => 58,  179 => 57,  177 => 56,  174 => 55,  170 => 51,  167 => 50,  164 => 49,  162 => 48,  159 => 47,  151 => 41,  149 => 40,  131 => 37,  127 => 34,  124 => 31,  123 => 30,  122 => 29,  120 => 28,  118 => 27,  115 => 25,  113 => 24,  110 => 22,  108 => 21,  106 => 20,  103 => 19,  101 => 18,  98 => 17,  91 => 13,  89 => 12,  61 => 11,  58 => 9,  55 => 7,  53 => 6,  50 => 5,  48 => 4,  45 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'bootstrap_3_layout.html.twig' %}

{%- block form_start -%}
  {% set attr = attr|merge({class: (attr.class|default(''))|trim}) %}
  {% set method = method|upper %}
  {%- if method in [\"GET\", \"POST\"] -%}
    {% set form_method = method %}
  {%- else -%}
    {% set form_method = \"POST\" %}
  {%- endif -%}
  <form {% if name %}name=\"{{ name }}\"{% endif %} method=\"{{ form_method|lower }}\" action=\"{{ action }}\"{% for attrname, attrvalue in attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}{% if multipart %} enctype=\"multipart/form-data\"{% endif %}>
  {%- if form_method != method -%}
    <input type=\"hidden\" name=\"_method\" value=\"{{ method }}\"/>
  {%- endif -%}
{%- endblock form_start -%}

{% block form_label -%}
  {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' control-label')|trim}) %}

  {% if label is not same as(false) -%}
    {% if not compound -%}
      {% set label_attr = label_attr|merge({'for': id}) %}
    {%- endif -%}
    {% if required -%}
      {% set label_attr = label_attr|merge({'class': (label_attr.class|default('') ~ ' required')|trim}) %}
    {%- endif -%}
    {% if label is empty -%}
      {%- if label_format is not empty -%}
        {% set label = label_format|replace({
        '%name%': name,
        '%id%': id,
        }) %}
      {%- else -%}
        {% set label = name|humanize %}
      {%- endif -%}
    {%- endif -%}
    <label{% for attrname, attrvalue in label_attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}>{{ label|raw }}</label>
  {%- endif -%}

  {% if description %}
    <h5>{{ description }}</h5>
  {% endif %}
{%- endblock form_label %}



{% block form_widget_simple -%}
  {% if type is not defined or 'file' != type %}
    {% set attr = attr|merge({class: (attr.class|default(''))|trim}) %}
  {% endif %}
  {{- parent() -}}
{%- endblock form_widget_simple %}


{% block radio_label -%}
  {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' in-label')|trim}) -%}
  {% if 'standalone' in label_attr.class %}
    {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' control-label')|trim}) -%}
  {% endif %}
  {% if label is not same as(false) -%}
    {% if not compound -%}
      {% set label_attr = label_attr|merge({'for': id}) %}
    {%- endif -%}
    {% if required -%}
      {% set label_attr = label_attr|merge({'class': (label_attr.class|default('') ~ ' required')|trim}) %}
    {%- endif -%}
    {% if label is empty -%}
      {%- if label_format is not empty -%}
        {% set label = label_format|replace({
        '%name%': name,
        '%id%': id,
        }) %}
      {%- else -%}
        {% set label = name|humanize %}
      {%- endif -%}
    {%- endif -%}
    <label{% for attrname, attrvalue in label_attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}>{{ translation_domain is same as(false) ? label : label|trans({}, translation_domain) }}</label>
  {%- endif -%}
{%- endblock radio_label %}

{% block checkbox_label -%}
  {#{% if 'standalone' in label_attr.class %}#}
    {#{{ block('form_label') }}#}
    {#{% else %}#}
      {{ block('radio_label') }}
  {#{% endif %}#}

{%- endblock checkbox_label %}

{% block radio_widget %}
  {% set attr = attr|merge({class: (attr.class|default('') ~ ' in-radio')|trim}) -%}
  <input type=\"radio\" {{ block('widget_attributes') }}{% if value is defined %} value=\"{{ value }}\"{% endif %}{% if checked %} checked=\"checked\"{% endif %} />
{% endblock %}

{% block checkbox_widget %}
  {% set attr = attr|merge({class: (attr.class|default('') ~ ' in-checkbox')|trim}) -%}
  <input type=\"checkbox\" {{ block('widget_attributes') }}{% if value is defined %} value=\"{{ value }}\"{% endif %}{% if checked %} checked=\"checked\"{% endif %} />
  {% if 'standalone' in label_attr.class %}
    {{- form_label(form, null, { widget: parent() }) -}}
  {% endif %}
{% endblock %}



{% macro render_tree(options, arr) %}
  {% from _self import render_tree as recursive %}
  <ul class=\"bonsai region-list js-tree\">
    {% for option in options %}
      <li>
        {{ attribute(arr, ('el'~option.term_id)) }}
        {% if option.children is not empty %}
          {{ recursive(option.children,arr) }}
        {% endif %}
      </li>
    {% endfor %}

  </ul>
{% endmacro %}


{%- block choice_widget_expanded -%}
  {% if not as_dropdown %}
    <div {{ block('widget_container_attributes') }}>
      {%- for child in form %}
        <div>
          {{- form_widget(child) -}}
          {{- form_label(child) -}}
        </div>
      {% endfor -%}
    </div>
  {% else %}


    {% from _self import render_tree as render_tree %}

    {% set arr = {} %}
    {%- for child in form %}
      {% set html %}
        {{ form_widget(child, { is_choice: true }) }}
        {{ form_label(child, null, {
          is_choice: true,
          label_attr: {
            class: 'in-label',
            'data-toggle': 'tooltip',
            'data-placement': 'top',
            'title': child.vars.label
          }
        }) }}
      {% endset %}
      {% set arr = arr|merge({('el'~child.vars.value): html}) %}
    {% endfor %}


    <div class=\"dropdown dropdown--select\" {{ block('widget_container_attributes') }}>
      <button type=\"button\" data-toggle=\"dropdown\" data-placeholder=\"{{ __('Any', 'realtyspace') }}\"
              class=\"dropdown-toggle js-select-checkboxes-btn\">
        {{ __('Any', 'realtyspace') }}
      </button>

      <div class=\"dropdown-menu js-dropdown-menu js-select-checkboxes\">
        <div class=\"dropdown__content\">
          {% if list_indent %}

            <div class=\"region-select\">
              {{ render_tree(list_indent, arr) }}
            </div>
          {% else %}
            <ul class=\"dropdown__list\">
              {% for item in arr %}
                <li>
                  {{ item }}
                </li>
              {% endfor %}
            </ul>
          {% endif %}
        </div>

        <div class=\"dropdown__buttons\">
          <button type=\"button\" class=\"btn--default btn--default--reset js-select-checkboxes-reset\">{{ __('Clear', 'realtyspace') }}</button>
          <button type=\"button\" class=\"btn--default js-select-checkboxes-accept\">{{ __('Accept', 'realtyspace') }}</button>
        </div>
      </div>
    </div>
  {% endif %}
{%- endblock choice_widget_expanded -%}


{% block textarea_widget -%}
  {% set attr = attr|merge({class: (attr.class|default(''))|trim}) %}
  {{- parent() -}}
{%- endblock textarea_widget %}

{% block honeypot_row %}
  {{ form_widget(form) }}
{% endblock %}

{% block form_row -%}
  <div class=\"form-group{% if (not compound or force_error|default(false)) and not valid %} has-error{% endif %} {{ row_class|default('') }} {{ required ? 'required' }}\">
    {{ form_label(form) }}
    {{ form_widget(form) }}
    {{ form_errors(form) }}
  </div>
{%- endblock form_row %}

{% block rangeslider_widget %}
  <div class=\"form__mode\">

    {% set range  = __('Range', 'realtyspace') %}
    {% set from = __('From', 'realtyspace') %}
    {% set to = __('To', 'realtyspace') %}

    <button type=\"button\" data-mode=\"input\" class=\"form__mode-btn js-input-mode\" data-toggle-value=\"{{ range }}\">
      {{ __('Input', 'realtyspace') }}
    </button>
  </div>
  <div class=\"form__ranges\">
    {%- set type = type|default('text') -%}
    {% set class = ' js-form-range form__ranges-in' %}
    {% set attr = attr|merge({'class': (attr.class|default('') ~ class)|trim}) %}
    {{ block('form_widget_simple') }}
  </div>
  <div class=\"form__inputs \" data-form-ranges>
    <input type=\"text\" placeholder=\"{{ from }}\" data-form-field data-field-type=\"from\" class=\"form-control\">
    <input type=\"text\" placeholder=\"{{ to }}\" data-form-field data-field-type=\"to\" class=\"form-control\">
  </div>
{% endblock %}


{% block dropzone_widget %}
  {% set attr = attr|merge({
  class: (attr.class|default('') ~ ' dropzone dropzone--submit form__dropzone')|trim,
  }) %}
  {{ block('collection_widget') }}
{% endblock %}

{% block image_widget %}
  {{ form_widget(form) }}
{% endblock %}

{% block map_widget %}
  {% set attr = attr|merge({
  class: (attr.class|default('') ~ ' map js-dapi-loc-gmap')|trim,
  }) %}
  <div {{ block('widget_container_attributes') }}>
    {%- if form.parent is empty -%}
      {{ form_errors(form) }}
    {%- endif -%}
    <div class=\"row map__autocomplete\">
      {{ form_widget(form.address, {'attr': {'class': 'form-control--autocomplete'}}) }}

      {{- block('form_rows') -}}
      <div class=\"map__buttons\">
        <button data-map-button type=\"button\" class=\"map__change-map js-map-btn\">{{ __('Address Map', 'realtyspace') }}</button>
      </div>
      <button type=\"button\" class=\"map__geolocation js-geolocate\">
        <svg>
          <use xlink:href=\"#icon-geolocation\"></use>
        </svg>
      </button>
    </div>
    <div class=\"map__wrap\">
      <div data-map data-map-canvas class=\"map__view map__view--property-form js-map-canvas\"></div>
    </div>
    {{- form_rest(form) -}}
  </div>

{% endblock %}

{% block dynamic_row_widget %}
  {% set attr = attr|merge({class: (attr.class|default('') ~ ' form__dynamic-row js-dapi-dynarow')|trim}) %}
  {{ block('collection_widget') }}
{% endblock %}

{% block dynamic_row_name_value_row %}
  <div class=\"row\" data-row>
    {% set row_class = 'form__dynamic-group' %}
    {{ block('form_row') }}
    {% set total_items = form.parent.children|length %}
    {% set current_item = form.vars.name + 1 %}
    <div class=\"form-group form__dynamic-buttons\">
      <button type=\"button\" data-remove-row class=\"btn--minus\"></button>
      <button type=\"button\" class=\"btn--plus\" data-add-row
              {% if current_item != total_items and prototype is not defined %}class=\"hide\"{% endif %}
      >
      </button>

    </div>
  </div>
{% endblock %}

{% block dynamic_row_name_value_label %}
{% endblock %}

", "modules/core/form-themes/global.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/core/form-themes/global.twig");
    }
}
